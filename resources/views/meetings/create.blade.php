<!DOCTYPE html>
<html>
<head>
    <title>Agendar Reunião</title>
</head>
<body>
    <h1>Agendar Reunião</h1>
    <form action="{{ route('meetings.store') }}" method="POST">
        @csrf
        <label for="coordinator_id">Coordenador:</label>
        <select name="coordinator_id" required>
            @foreach($coordinators as $coordinator)
                <option value="{{ $coordinator->id }}">{{ $coordinator->name }}</option>
            @endforeach
        </select><br>

        <label for="student_id">Aluno:</label>
        <select name="student_id" required>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select><br>

        <label for="scheduled_at">Data e Hora:</label>
        <input type="datetime-local" name="scheduled_at" required><br>

        <label for="location">Local:</label>
        <input type="text" name="location" required><br>

        <button type="submit">Agendar</button>
    </form>
</body>
</html>