<!DOCTYPE html>
<html>
<head>
    <title>Detalhes da Reunião</title>
</head>
<body>
    <h1>Detalhes da Reunião</h1>
    <p>ID: {{ $meeting->id }}</p>
    <p>Coordenador: {{ $meeting->coordinator->name }}</p>
    <p>Aluno: {{ $meeting->student->name }}</p>
    <p>Data e Hora: {{ $meeting->scheduled_at }}</p>
    <p>Local: {{ $meeting->location }}</p>
    <a href="{{ route('meetings.edit', $meeting->id) }}">Editar</a>
    <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Deletar</button>
    </form>
</body>
</html>