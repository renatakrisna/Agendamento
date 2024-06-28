<!DOCTYPE html>
<html>

<head>
    @vite('resources/css/app.css')
    <title>Agendamentos</title>
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

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Agendamentos</h2>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <br></br>
                    <a href="{{ route('meetings.create') }}" class="p-3 rounded-md bg-gray-700 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Agendar Reunião</a>
                    <br></br>
                </div>
                <div class="mt-0 border-t border-gray-100">

                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="pr-5">Coordenador</th>
                                <th class="pr-5">Aluno</th>
                                <th class="pr-8">Data e Hora</th>
                                <th class="pr-5">Local</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        @foreach ($meetings as $meeting)
                        <tr>
                            <td class="pr-5">{{ $meeting->coordinator->name }}</td>
                            <td class="pr-5">{{ $meeting->student->name }}</td>
                            <td class="pr-8">{{ $meeting->scheduled_at }}</td>
                            <td class="pr-5">{{ $meeting->location }}</td>
                            <td class="pr-5"><a href="{{ route('meetings.show', $meeting->id) }}"class="flex w-full justify-center rounded-md bg-gray-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >Ver</a>
                            </td>
                            <td class="pr-5"><a href="{{ route('meetings.edit', $meeting->id) }}" class="flex w-full justify-center rounded-md bg-gray-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Editar</a></td>
                            <td>
                                <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex w-full justify-center rounded-md bg-gray-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Deletar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
</body>

</html>