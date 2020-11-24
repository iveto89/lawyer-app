<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('appointments.index') }}" method="GET" role="search">

                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search appointments">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search appointments" id="term">
                        <a href="{{ route('appointments.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
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
                                    <span class="text-center ml-2 font-semibold">{{$loop->index + 1}}</span>
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
                                    <a href="{{route('appointments.edit', ['appointment' => $appointment])}}"
                                       class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black"
                                    >Edit</a>
                                    <a href="{{route('appointments.destroy', ['appointment' => $appointment])}}" onclick="return confirm('Are you sure?')"
                                       class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-red-500 hover:text-black"
                                    >Delete</a>
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
