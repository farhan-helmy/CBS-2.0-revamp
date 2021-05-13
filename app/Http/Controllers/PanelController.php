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

    public function edit(Panel $panel)
    {

        return view('panel.edit', compact('panel'));
    }

    public function update(Request $request, Panel $panel)
    {
        $panel->update($request->all());

        return redirect()->route('panel.records')
            ->with('success', 'Panel updated successfully!');
    }

    public function show(Panel $panel)
    {

        return view('panel.show', compact('panel'));
    }

    public function destroy(Panel $panel)
    {
        $panel->delete();

        return redirect()->route('panel.records')
            ->with('success', 'Panel deleted successfully');
    }
}
