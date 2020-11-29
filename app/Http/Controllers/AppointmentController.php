<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Services\AppointmentService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AppointmentService $appointmentService
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(AppointmentService $appointmentService, Request $request)
    {
        $searchTerm = $request->get('term');

        $appointments = $appointmentService->getAppointments($searchTerm)->paginate(10);

        return view('appointments.index', [
            'appointments' => $appointments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function create(UserService $userService)
    {
        $lawyers = $userService->getUsersByRoleDropdown('lawyer');

        return view('appointments.create', [
            'lawyers' => $lawyers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAppointmentRequest $createAppointmentRequest
     * @param AppointmentService $appointmentService
     * @return void
     */
    public function store(CreateAppointmentRequest $createAppointmentRequest, AppointmentService $appointmentService)
    {
        $requestData = $createAppointmentRequest->all();
        $requestData['citizen_id'] = Auth::user()->getAuthIdentifier();

        if ($appointmentService->isAppointmentConflicting($requestData)) {
            return redirect()->route('appointments.create')
                ->with('error_message', 'There is an appointment for the specified datetime. Please select another datetime range.');
        }

        $appointmentService->createAppointment($requestData);

        return redirect()->route('appointments.index')
            ->with('success_message', 'Appointment successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAppointmentRequest $updateAppointmentRequest
     * @param int $id
     * @return void
     */
    public function update(UpdateAppointmentRequest $updateAppointmentRequest, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
