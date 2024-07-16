<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\User;
use Carbon\Carbon;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all();
        return view('meetings.index', compact('meetings'));
    }

    public function create()
    {
        $coordinators = User::where('role', 'coordinator')->get();
        $students = User::where('role', 'student')->get();
        return view('meetings.create', compact('coordinators', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'scheduled_at' => [
                'required',
                function ($attribute, $value, $fail) {
                    $scheduled_at = Carbon::parse($value);
                    $startAllowed = Carbon::parse($scheduled_at->format('Y-m-d') . ' 08:00:00');
                    $endAllowed = Carbon::parse($scheduled_at->format('Y-m-d') . ' 19:00:00');
                    if ($scheduled_at->lt($startAllowed) || $scheduled_at->gt($endAllowed)) {
                        $fail('O horário da reunião deve estar entre 08:00 e 19:00.');
                    }
                },
            ],
            'coordinator_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:users,id',
            'location' => 'required',
        ]);

        $scheduled_at = Carbon::parse($request->scheduled_at);
        $end_datetime = $scheduled_at->copy()->addHour();

        $meeting = Meeting::whereBetween('scheduled_at', [$scheduled_at, $end_datetime])->first();

        if ($meeting) {
            return redirect()->route('meetings.create')->with('alreadyExist', 'Já existe uma reunião agendada neste horário!');
        } else {

            Meeting::create([
                'scheduled_at' => $request->scheduled_at,
                'coordinator_id' => $request->coordinator_id,
                'student_id' => $request->student_id,
                'location' => $request->location,
            ]);

            return redirect()->route('meetings.index')->with('success', 'Reunião agendada com sucesso.');
        }
    }

    public function show(Meeting $meeting)
    {
        return view('meetings.show', compact('meeting'));
    }

    public function edit(Meeting $meeting)
    {
        $coordinators = User::where('role', 'coordinator')->get();
        $students = User::where('role', 'student')->get();
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
