<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '75681234',
            'password' => Hash::make('password123'),
        ]);

        $doctor1 = Doctor::create([
            'name' => 'Dr. Test Doctor',
            'specialty' => 'Cardiología',
            'location' => 'Consultorio 12B',
        ]);

        $doctor2 = Doctor::create([
            'name' => 'Dr. Daniel Test',
            'specialty' => 'Pediatría',
            'location' => 'Consultorio 05A',
        ]);

        $doctor3 = Doctor::create([
            'name' => 'Dra. María Test',
            'specialty' => 'Dermatología',
            'location' => 'Consultorio 08C',
        ]);

        Appointment::create([
            'user_id' => $user->id,
            'doctor_id' => $doctor1->id,
            'appointment_date' => Carbon::now()->addDays(3)->setTime(10, 0),
            'status' => 'programada',
            'notes' => 'Chequeo general preventivo.',
        ]);

        Appointment::create([
            'user_id' => $user->id,
            'doctor_id' => $doctor2->id,
            'appointment_date' => Carbon::now()->subMonths(1)->setTime(15, 30),
            'status' => 'completada',
        ]);

        Appointment::create([
            'user_id' => $user->id,
            'doctor_id' => $doctor3->id,
            'appointment_date' => Carbon::now()->subMonths(2)->setTime(9, 0),
            'status' => 'completada',
        ]);

        Appointment::create([
            'user_id' => $user->id,
            'doctor_id' => $doctor1->id,
            'appointment_date' => Carbon::now()->subDays(15)->setTime(11, 0),
            'status' => 'cancelada',
        ]);
    }
}
