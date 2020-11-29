@extends('layouts.main')

@section('content')
    @role('citizen')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{ Form::open(array('route' => 'appointments.store')) }}
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                @include('partials.appointment-fields')
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    @endrole
@endsection
