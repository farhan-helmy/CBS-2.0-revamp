<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        return view('panels.index');
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $user = Panel::create($request->all());

        return redirect()->route('panel.records')
            ->with('success', 'Panel registered successfully.');
    }

    public function records()
    {
        $panels = Panel::all();

        return view('panels.records', compact('panels'));
    }
}
