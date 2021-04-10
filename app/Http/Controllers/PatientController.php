<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        return view('patients.index');
    }

    public function savePatient(Request $request)
    {
        $request->validate([
            'nric' => 'required|unique:users'
        ]);

        //dd($request->all());
        $user = User::create($request->all());

        $user->assignRole('patient');

        return redirect()->route('patient.index')
            ->with('success', 'Patients registered successfully.');
    }

    public function records()
    {
        $users = User::role('patient')->get();

        return view('patients.records', compact('users'));
    }
}
