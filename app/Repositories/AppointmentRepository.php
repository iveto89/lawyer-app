<?php

namespace App\Repositories;

use App\Models\Appointment;
use App\Models\AppointmentStatus;
use Illuminate\Database\Eloquent\Builder;

class AppointmentRepository extends AbstractRepository
{
    /**
     * @param string|null $searchText
     * @return Builder
     */
    public function getAppointments(?string $searchText): Builder
    {
        $query = Appointment::with(['appointment_status', 'citizen', 'lawyer']);

        if ($searchText) {
            // @todo add search filter
        }

        return $query->oldest();
    }

    /**
     * @param array $appointmentData
     * @return Appointment
     */
    public function createAppointment(array $appointmentData): Appointment
    {
        $appointmentStatus = AppointmentStatus::where('name', AppointmentStatus::STATUS_REQUESTED)->first();

        $appointmentData['appointment_status_id'] = $appointmentStatus->id;

        return Appointment::create($appointmentData);
    }

    /**
     * @param Appointment $appointment
     * @param array $appointmentData
     * @return Appointment
     */
    public function updateAppointmentStatus(Appointment $appointment, array $appointmentData): Appointment
    {
        $appointmentStatus = AppointmentStatus::where('name', $appointmentData['status'])->firstOrFail();

        $appointment->appointment_status_id = $appointmentStatus->id;
        $appointment->save();

        return $appointment;
    }

    /**
     * @param array $appointmentData
     * @return bool
     */
    public function isAppointmentConflicting(array $appointmentData): bool
    {
        return Appointment::where('lawyer_id', $appointmentData['lawyer_id'])
            ->where('valid_to', '>=', $appointmentData['valid_from'])
            ->where('valid_from', '<=', $appointmentData['valid_to'])
            ->exists();
    }
}
