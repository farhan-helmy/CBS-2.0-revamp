<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $panels = Panel::all();
        return view('patients.index', compact('panels'));
    }

    public function savePatient(Request $request)
    {

        //dd($request->all());
        $user = User::create($request->all());

        //$user->panel_id = $request->panel_id;

        $user->assignRole('patient');

        return redirect()->route('patient.index')
            ->with('success', 'Patients registered successfully.');
    }

    public function records()
    {
        $users = User::role('patient')->get();

        $i = 1;

        return view('patients.records', compact('users', 'i'));
    }

    public function show(User $user)
    {

        return view('patients.show', compact('user'));
    }

    public function edit(User $user)
    {

        $panels = Panel::all();
        return view('patients.edit', compact('user', 'panels'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('patient.records')
            ->with('success', 'Patient updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('patient.records')
            ->with('success', 'User deleted successfully');
    }
}
