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
        return view('appointment.records');
    }

    public function set(User $user)
    {
        $users = User::role('patient')->get();

        $user->status = 'queue';
        $time_now = Carbon::now();
        $user->save();

        DB::table('appointments')->insert([
            'user_id' => $user->id
        ]);

        return view('appointment.index', compact('users'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $users = DB::table('users')->where('nric', 'LIKE', '%' . $request->search . "%")->get();

            if ($users) {

                foreach ($users as $key => $user) {
                    $output .= '<tr>' .
                        '<td>' . $user->id . '</td>' .
                        '<td>' . $user->name . '</td>' .
                        '<td>' . $user->nric . '</td>' .
                        '<td> <button class="btn btn-rounded btn-primary"> <a href="/appointment/sets/'. $user->id .'">..</a>SET</button></td>' .
                        '</tr>';
                }
                return Response($output);
            }
        }
    }
}
