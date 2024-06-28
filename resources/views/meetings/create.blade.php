<!DOCTYPE html>
<html>

<head>
    @vite('resources/css/app.css')
    <title>Agendar Reunião</title>
</head>

<body>

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
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Agendar Reunião</h2>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <div class="mx-auto mt-10  max-w-2xl gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                            <form action="{{ route('meetings.store') }}" method="POST">
                                @csrf

                                <div div class="sm:col-span-3">
                                    <label for="coordinator_id" class="block text-lg font-medium leading-6 text-gray-900">Coordenador:</label>
                                    <select name="coordinator_id" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:max-w-xs sm:text-sm sm:leading-6">
                                        @foreach($coordinators as $coordinator)
                                        <option value="{{ $coordinator->id }}">{{ $coordinator->name }}</option>
                                        @endforeach
                                    </select><br>
                                </div>

                                <label for="student_id" class="block text-lg font-medium leading-6 text-gray-900">Aluno:</label>
                                <select name="student_id" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select><br>

                                <label for="scheduled_at" class="block text-lg font-medium leading-6 text-gray-900">Data e Hora:</label>
                                <input type="datetime-local" name="scheduled_at"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:max-w-xs sm:text-sm sm:leading-6" required><br>

                                <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Local:</label>
                                <input type="text" name="location" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6" required><br>

                                <button type="submit" class="flex w-full justify-center rounded-md bg-gray-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Agendar</button>
                            </form>
    </body>

</html>