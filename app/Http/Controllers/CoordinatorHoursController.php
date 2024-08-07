<?php

namespace App\Http\Controllers;

use App\Models\CoordinatorHours;
use Illuminate\Http\Request;

class CoordinatorHoursController extends Controller
{
    public function index()
    {
        $coordinatorHours = CoordinatorHours::all();
        return view('coordinator_hours.index', compact('coordinatorHours'));
    }

    public function create()
    {
        return view('coordinator_hours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'coordinator_id' => 'required|exists:users,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        CoordinatorHours::create($request->all());

        return redirect()->route('coordinator_hours.index')
                         ->with('success', 'Horário de atendimento cadastrado com sucesso!');
    }

    public function edit(CoordinatorHours $coordinatorHours)
    {
        return view('coordinator_hours.edit', compact('coordinatorHours'));
    }

    public function update($id, Request $request, CoordinatorHours $coordinatorHours)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $dados = $request->all();
        CoordinatorHours::where('coordinator_id', $id)
                        ->update(['start_time' => $dados['start_time'], 'end_time' => $dados['end_time']]);

        return redirect()->route('meetings.index')
                         ->with('success', 'Horário de atendimento atualizado com sucesso!');
    }
}
