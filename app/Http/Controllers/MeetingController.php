<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\User;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all();
        return view('meetings.index', compact('meetings'));
    }

    public function create()
    {
        $coordinators = User::all();
        $students = User::all();
        return view('meetings.create', compact('coordinators', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coordinator_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:users,id',
            'scheduled_at' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        Meeting::create($request->all());

        return redirect()->route('meetings.index')->with('success', 'Reunião agendada com sucesso.');
    }

    public function show(Meeting $meeting)
    {
        return view('meetings.show', compact('meeting'));
    }

    public function edit(Meeting $meeting)
    {
        $coordinators = User::all();
        $students = User::all();
        return view('meetings.edit', compact('meeting', 'coordinators', 'students'));
    }

    public function update(Request $request, Meeting $meeting)
    {
        $request->validate([
            'coordinator_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:users,id',
            'scheduled_at' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $meeting->update($request->all());

        return redirect()->route('meetings.index')->with('success', 'Reunião atualizada com sucesso.');
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('meetings.index')->with('success', 'Reunião deletada com sucesso.');
    }
}
