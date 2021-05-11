<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role(['doctor', 'staff'])->get();
      
        $i = 1;
        return view('doctor.index', compact('users', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $panels = Panel::all();
        return view('doctor.create', compact('panels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        $user->password = Hash::make($request->password);

        $user->save();

        if($request->usertype == 1){
            $user->assignRole('doctor');
        }elseif($request->usertype == 2){
            $user->assignRole('staff');
        }elseif($request->usertype == 3){
            $user->assignRole('patient');
        }

        return redirect()->route('doctor.index')
            ->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('doctor.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $panels = Panel::all();
        return view('doctor.edit', compact('user', 'panels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('doctor.index')
            ->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('doctor.index')
            ->with('success', 'User deleted successfully');
    }
}
