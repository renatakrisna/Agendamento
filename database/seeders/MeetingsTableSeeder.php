<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meeting;
use App\Models\User;
use Carbon\Carbon;

class MeetingsTableSeeder extends Seeder
{
    public function run()
    {
        $coordinator = User::where('email', 'coordenador@example.com')->first();
        $student = User::where('email', 'aluno@example.com')->first();

        Meeting::create([
            'coordinator_id' => $coordinator->id,
            'student_id' => $student->id,
            'scheduled_at' => Carbon::now()->addDays(1),
            'location' => 'Sala 101'
        ]);

        Meeting::create([
            'coordinator_id' => $coordinator->id,
            'student_id' => $student->id,
            'scheduled_at' => Carbon::now()->addDays(2),
            'location' => 'Sala 102'
        ]);
    }
}
