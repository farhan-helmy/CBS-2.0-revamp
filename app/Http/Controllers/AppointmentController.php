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

        $i = 1;
        return view('appointment.index', compact('users','i'));
    }

    public function queue()
    {
        $users = User::where('status', 'queue')->get();

        return view('appointment.queue', compact('users'));
    }

    public function records()
    {
        $appointments = Appointment::has('patients')->get();
        return view('appointment.records', compact('appointments'));
    }

    public function set(User $user)
    {
        $user->status = 'queue';
        $time_now = Carbon::now();
        $user->save();
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
        $appointment = Appointment::create($request->all());
        $appointment->date_time = $time_now;
        $appointment->save();

        $user = User::find($request->user_id);

        $user->status = 'done';
        $user->save();

        $user->appointment()->attach($appointment->id);
        //dd($appointment);
        return redirect()->route('appointment.records')
            ->with('success', 'Patients records saved successfully.');
    }

    public function show(Appointment $appointment)
    {
        //dd($user->appointment());
        //dd($appointment->patients());
        return view('appointment.show', compact('appointment'));
    }

    public function unset(User $user)
    {
        $user->status = NULL;
        
        $user->save();

        return redirect()->route('appointment.set')
            ->with('success', 'Appointment unset successfully');
    }

    public function delete(User $user, Appointment $appointment)
    {
        $user->appointment()->detach($appointment->id);
        //$appointment->patients()->detach($user->id);
        return redirect()->route('appointment.records')
            ->with('success', 'Appointment deleted successfully');
    }

    public function edit(Appointment $appointment)
    {
        return view('appointment.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $appointment->update($request->all());

        return redirect()->route('appointment.records')
            ->with('success', 'Appointment edited successfully');
    }

   
}
