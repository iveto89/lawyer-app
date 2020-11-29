<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Repositories\AppointmentRepository;
use Illuminate\Database\Eloquent\Builder;

class AppointmentService
{
    /** @var AppointmentRepository */
    protected AppointmentRepository $appointmentRepository;

    /**
     * AppointmentService constructor.
     * @param AppointmentRepository $appointmentRepository
     */
    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    /**
     * @param string|null $searchText
     * @return Builder
     */
    public function getAppointments(?string $searchText): Builder
    {
        return $this->appointmentRepository->getAppointments($searchText);
    }

    /**
     * @param array $appointmentData
     * @return Appointment
     */
    public function createAppointment(array $appointmentData): Appointment
    {
        return $this->appointmentRepository->createAppointment($appointmentData);
    }

    /**
     * @param Appointment $appointment
     * @param array $appointmentData
     * @return Appointment
     */
    public function updateAppointmentStatus(Appointment $appointment, array $appointmentData): Appointment
    {
        return $this->appointmentRepository->updateAppointmentStatus($appointment, $appointmentData);
    }

    /**
     * @param Appointment $appointment
     * @param array $appointmentData
     * @return bool
     */
    public function validateAppointmentStatus(Appointment $appointment, array $appointmentData): bool
    {
        $requestedStatus = $appointmentData['status'];
        $currentStatus = $appointment->appointment_status->name;

        if (
            !in_array($currentStatus, [AppointmentStatus::STATUS_REQUESTED, AppointmentStatus::STATUS_RESCHEDULED]) &&
            in_array($requestedStatus, [AppointmentStatus::STATUS_APPROVED, AppointmentStatus::STATUS_REJECTED])
        ) {
            return false;
        }

        return true;
    }

    /**
     * @param array $appointmentData
     * @return bool
     */
    public function isAppointmentConflicting(array $appointmentData): bool
    {
        return $this->appointmentRepository->isAppointmentConflicting($appointmentData);
    }
}
