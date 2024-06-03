<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    //index
    public function index(Request $request)
    {
        $absences = Absence::with('user')
            ->when($request->input('name'), function ($query, $name) {
                $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name', 'like', "%.$name.%");
                });
            })->orderBy('id', 'desc')->paginate(10);
        return view('pages.absence.index', compact('absences'));
    }

    //show
    public function show($id)
    {

        $absence = Absence::with('user')->find($id);
        return view('pages.absence.show', compact('absence'));
    }

    //edit
    public function edit($id)
    {
        $absence = Absence::find($id);
        return view('pages.absence.edit', compact('absence'));
    }

    //update
    public function update(Request $request, $id)
    {
        $absence = Absence::find($id);
        $absence->is_approved = $request->is_approved;
        $absence->save();
        return redirect()->route('absences.index')->with('success', 'Absence updated successfully');
    }
}
