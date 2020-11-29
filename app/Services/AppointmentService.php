<?php

namespace App\Services;

use App\Models\Appointment;
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
     * @param array $appointmentData
     * @return bool
     */
    public function isAppointmentConflicting(array $appointmentData): bool
    {
        return $this->appointmentRepository->isAppointmentConflicting($appointmentData);
    }
}
