<!DOCTYPE html>
<html>
<head>
@vite('resources/css/app.css')
    <title>Agendamentos</title>
</head>
<body>
    <h1>Agendamentos</h1>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
    <a href="{{ route('meetings.create') }}">Agendar Reunião</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Coordenador</th>
                <th>Aluno</th>
                <th>Data e Hora</th>
                <th>Local</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meetings as $meeting)
                <tr>
                    <td>{{ $meeting->id }}</td>
                    <td>{{ $meeting->coordinator->name }}</td>
                    <td>{{ $meeting->student->name }}</td>
                    <td>{{ $meeting->scheduled_at }}</td>
                    <td>{{ $meeting->location }}</td>
                    <td>
                        <a href="{{ route('meetings.show', $meeting->id) }}">Ver</a>
                        <a href="{{ route('meetings.edit', $meeting->id) }}">Editar</a>
                        <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>