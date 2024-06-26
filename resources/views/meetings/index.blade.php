<!DOCTYPE html>
<html>
<head>
    <title>Agendamentos</title>
</head>
<body>
    <h1>Agendamentos</h1>
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