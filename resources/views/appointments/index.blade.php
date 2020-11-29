<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('appointments.index') }}" method="GET" role="search" class="sm:max-w-md float-left px-16 py-2">
                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button type="submit" title="Search appointments">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search appointments" id="term">
                    </div>
                </form>
                @role('citizen')
                    <div class="sm:max-w-md px-16 py-2 float-right">
                        <a href="{{ route('appointments.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>
                    </div>
                @endrole
                <table class="min-w-full table-auto">
                    <thead class="justify-between">
                    <tr class="bg-gray-800">
                        <th class="px-2 py-2">
                            <span class="text-gray-300">No</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-300">Citizen name</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-300">Lawyer name</span>
                        </th>
                        <th class="px-8 py-2">
                            <span class="text-gray-300">Starts at</span>
                        </th>
                        <th class="px-8 py-2">
                            <span class="text-gray-300">Ends at</span>
                        </th>
                        <th class="px-8 py-2">
                            <span class="text-gray-300">Status</span>
                        </th>
                        <th class="px-8 py-2">
                            <span class="text-gray-300">Created at</span>
                        </th>
                        <th class="px-16 py-4 max-w-sm md:max-w-lg">
                            <span class="text-gray-300">Actions</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                        @foreach($appointments as $appointment)
                            <tr class="bg-white border-4 border-gray-200">
                                <td class="text-center">
                                    <span class="text-center ml-2 font-semibold">{{$loop->iteration + $appointments->firstItem() - 1}}</span>
                                </td>
                                <td class="px-16 py-2 text-center">
                                    <span>{{$appointment->citizen->name}}</span>
                                </td>
                                <td class="px-16 py-2 text-center">
                                    <span>{{$appointment->lawyer->name}}</span>
                                </td>
                                <td class="px-8 py-2 text-center">
                                    <span>{{$appointment->valid_from->format('d/m/Y')}}</span>
                                </td>
                                <td class="px-8 py-2 text-center">
                                    <span>{{$appointment->valid_to->format('d/m/Y')}}</span>
                                </td>
                                <td class="px-8 py-2 text-center">
                                    <span>{{$appointment->appointment_status->name}}</span>
                                </td>
                                <td class="px-8 py-2 text-center">
                                    <span>{{$appointment->created_at->format('d/m/Y')}}</span>
                                </td>
                                <td class="max-w-sm md:max-w-lg text-center">
                                    @role('citizen')
                                        <a href="{{route('appointments.edit', ['appointment' => $appointment])}}"
                                           class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:text-black"
                                        >Edit</a>
                                        <a href="{{route('appointments.destroy', ['appointment' => $appointment])}}" onclick="return confirm('Are you sure?')"
                                           class="bg-red-500 text-white px-4 py-2 border rounded-md hover:text-black"
                                        >Delete</a>
                                    @endrole

                                    @role('lawyer')
                                        @if($appointment->appointment_status->name == App\Models\AppointmentStatus::STATUS_REQUESTED)
                                            {!! Form::open(array('route' => ['appointments.review', 'appointment' => $appointment, 'status' => 'approved'], 'class' => 'form')) !!}
                                                {!! Form::submit('Approve', ['class' => 'bg-indigo-500 text-white px-4 py-2 border rounded-md hover:text-black'] ) !!}
                                            {{ Form::close() }}

                                            {!! Form::open(array('route' => ['appointments.review', 'appointment' => $appointment, 'status' => 'rejected'], 'class' => 'form')) !!}
                                                {!! Form::submit('Reject', ['class' => 'bg-indigo-500 text-white px-4 py-2 border rounded-md hover:text-black'] ) !!}
                                            {{ Form::close() }}
                                        @endif
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $appointments->links() }}
        </div>
    </div>
</x-app-layout>
