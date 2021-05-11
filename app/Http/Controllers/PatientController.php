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

        return view('patients.records', compact('users'));
    }

    public function show(User $user)
    {

        return view('patients.show', compact('user'));
    }
}
