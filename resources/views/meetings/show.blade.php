<!DOCTYPE html>
<html>
<head>
    @vite('resources/css/app.css')
    <title>Detalhes da Reunião</title>
</head>
<body>
<div id="app">
            <nav class="bg-gray-900">
                <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                    <div class="relative flex h-16 items-center justify-between">
                        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden"></div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <a class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </nav>
        </div>
        </div>
        </div>
        </div>
        </nav>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Detalhes da Reunião</h2>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <div class="mx-auto mt-10  max-w-2xl gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                            <form action="{{ route('meetings.update', $meeting->id) }}" method="POST">
                            <div class="mt-0 border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                            <dt class="text-lg font-medium leading-10 text-gray-900">Coordenador: {{ $meeting->coordinator->name }}</dt>
                            <dt class="text-lg font-medium leading-10 text-gray-900">Aluno: {{ $meeting->student->name }}</dt>
                            <dt class="text-lg font-medium leading-10 text-gray-900">Data e Hora: {{ $meeting->scheduled_at }}</dt>
                            <dt class="text-lg font-medium leading-10 text-gray-900">Local: {{ $meeting->location }}</dt>
                        </div>

    <a href="{{ route('meetings.edit', $meeting->id) }}" class="flex w-full justify-center mb-4 mt-4 rounded-md bg-gray-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Editar</a>
                        <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex w-full justify-center rounded-md bg-gray-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Deletar</button>
    </form>
</body>
</html>