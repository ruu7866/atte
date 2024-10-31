<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateController extends Controller
{
    public function Date()
    {
        $dates = DB::table('users')
            ->join('attendances', 'attendances.user_id', '=', 'users.id')
            ->join('rests', 'rests.attendanced_id', '=', 'attendances.id')

            ->select(
               'users.name',                      // ユーザーの名前
               'attendances.start_time as start', // 勤務開始時間
               'attendances.end_time as end'      // 勤務終了時間
            )
            ->get();


        return view('auth.date', compact('dates')); 
    }

}
