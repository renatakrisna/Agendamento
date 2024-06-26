<!DOCTYPE html>
<html>
<head>
    <title>Editar Reunião</title>
</head>
<body>
    <h1>Editar Reunião</h1>
    <form action="{{ route('meetings.update', $meeting->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="coordinator_id">Coordenador:</label>
        <select name="coordinator_id" required>
            @foreach($coordinators as $coordinator)
                <option value="{{ $coordinator->id }}" {{ $coordinator->id == $meeting->coordinator_id ? 'selected' : '' }}>{{ $coordinator->name }}</option>
            @endforeach
        </select><br>

        <label for="student_id">Aluno:</label>
        <select name="student_id" required>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ $student->id == $meeting->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
            @endforeach
        </select><br>

        <label for="scheduled_at">Data e Hora:</label>
        <input type="datetime-local" name="scheduled_at" value="{{ $meeting->scheduled_at}}" required><br>

        <label for="location">Local:</label>
        <input type="text" name="location" value="{{ $meeting->location }}" required><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>