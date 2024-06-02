<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //checkin
    public function checkin(Request $request)
    {
        // lat and long validation
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // save new attendance
        $attendance = new Attendance;
        $attendance->user_id = $request->user()->id;
        $attendance->date = date('Y-m-d');
        $attendance->time_in = date('H:i:s');
        $attendance->latlon_in = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response([
            'message' => 'Checkin success',
            'attendance' => $attendance
        ], 200);



    }

    //checkout
    public function checkout(Request $request)
    {
        // lat and long validation
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        //get today's attendance
        $attendance = Attendance::where('user_id', $request->user()->id)->where('date', date('Y-m-d'))->first();

        //if attendance not found
        if (!$attendance) {
            return response([
                'message' => 'Checkin first',
            ], 404);
        }

        //save checkout
        $attendance->time_out = date('H:i:s');
        $attendance->latlon_out = $request->latitude . ',' . $request->longitude;
        $attendance->save();

        return response([
            'message' => 'Checkout success',
            'attendance' => $attendance
        ], 200);

    }

    //check if user is checked in
    public function isCheckedin(Request $request)
    {
        $attendance = Attendance::where('user_id', $request->user()->id)->where('date', date('Y-m-d'))->first();
        return response([
            'checkedin' => $attendance ? true : false
        ], 200);

    }
}
