<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index()
    {
        $users = User::role('patient')->get();

        //dd($users);
        return view('appointment.index', compact('users'));
    }

    public function queue()
    {
        $users = User::where('status', 'queue')->get();

        return view('appointment.queue', compact('users'));
    }

    public function records()
    {
        $users = User::where('status', 'done')->get();
        return view('appointment.records', compact('users'));
    }

    public function set(User $user)
    {
        $user->status = 'queue';
        $time_now = Carbon::now();
        $user->save();

        DB::table('appointments')->insert([
            'user_id' => $user->id
        ]);
        $users = User::where('status', 'queue')->get();

        return view('appointment.queue', compact('users'));
    }

    public function finishQueue(User $user)
    {
        return view('appointment.finish', compact('user'));
    }

    public function saveFinish(Request $request)
    {
        $time_now = Carbon::now();
        $appointment = Appointment::where('user_id', '=', $request->user_id)->first();

        $appointment->complaints = $request->complaint;
        $appointment->medication = $request->medication;
        $appointment->treatment_fee = $request->treatment_fee;
        $appointment->resit_no = $request->resit_no;
        $appointment->treatment = $request->treatment;
        $appointment->date_time = $time_now;
        $appointment->save();

        $user = User::where('id', '=', $request->user_id)->first();
        $user->status = 'done';
        $user->appointment_id = $appointment->id;
        $user->save();

        //dd($appointment);
        return redirect()->route('dashboard.index')
            ->with('success', 'Patients records saved successfully.');
    }

    public function show(User $user)
    {
        //dd($user->appointment());
        return view('appointment.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('appointment.index')
            ->with('success', 'User deleted successfully');
    }
    
}
