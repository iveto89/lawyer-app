<?php

namespace App\Services;

use App\Repositories\AppointmentRepository;
use Illuminate\Database\Eloquent\Builder;

class AppointmentService extends AbstractService
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
}
