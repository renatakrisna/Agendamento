@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Editar Horário de Atendimento</h2>
                <br></br>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <div class="mt-0 border-t border-gray-100">
                <br></br>

                <div class="card-body">
                    <form method="PUT" action="{{ route('coordinator_hours.update', ['id' => Auth::user()->id]) }}">
                        @csrf

                        <div class="mb-3">
                            <label for="start_time" class="block text-sm font-medium leading-6 text-gray-900 form-label">Hora de Início:</label>
                            <input id="start_time" type="time" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6 form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time', $coordinatorHours->start_time) }}" required>
                            @error('start_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="end_time" class="block text-sm font-medium leading-6 text-gray-900 form-label">Hora de Término:</label>
                            <input id="end_time" type="time" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6 form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time', $coordinatorHours->end_time) }}" required>
                            @error('end_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="flex w-full justify-center rounded-md bg-gray-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection