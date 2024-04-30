<?php

namespace App\Http\Controllers;

use App\Models\Monetary;
use Illuminate\Http\Request;

class MonetaryController extends Controller
{
    public function index()
    {
        $monetaries = Monetary::all();
        return view('monetaries.index', compact('monetaries'));
    }

    public function create()
    {
        return view('monetaries.create');
    }

    public function store(Request $request)
    {
        Monetary::create($request->all());
        return redirect()->route('monetaries.index')->with('success', 'Monetary created successfully.');
    }

    public function edit(Monetary $monetary)
    {
        return view('monetaries.edit', compact('monetary'));
    }

    public function update(Request $request, Monetary $monetary)
    {
        $monetary->update($request->all());
        return redirect()->route('monetaries.index')->with('success', 'Monetary updated successfully.');
    }

    public function destroy(Monetary $monetary)
    {
        $monetary->delete();
        return redirect()->route('monetaries.index')->with('success', 'Monetary deleted successfully.');
    }
}
