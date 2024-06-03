<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    //store
    public function store(Request $request)
    {
        $request->validate([
            'date_absence' => 'required',
            'reason' => 'required',

        ]);

        $absence = new Absence();
        $absence->user_id = $request->user()->id;
        $absence->date_absence = $request->date_absence;
        $absence->reason = $request->reason;
        $absence->is_approved = 0;

        if (request()->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/absence_images', $image->hashName());
            $absence->image = $image->hashName();
        }
        ;

        $absence->save();

        return response()->json([
            'message' => 'Absence created successfully'
        ], 201);
    }
}
