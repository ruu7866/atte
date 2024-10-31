<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RestController extends Controller
{
    public function restStart(){
      $user = Auth::user();

      $dt = Carbon::now();
      echo $dt->toDateString();
      $currentDate = $dt->toDateString();

      $time = Carbon::now();
      echo $time->toTimeString();
      $currentTime = $dt->toTimeString(); 

      $user_id = $user->id;
      $attendanced_id = 
      \DB::table('attendances')
        ->where('user_id', $user->id) //指定されたuser_idが一致するものを探す
        ->where('date', $currentDate) //指定されたdateが一致するものを探す
        ->whereNull('end_time') //退勤時間がまだ記録されてないもの
        ->latest('start_time')  //データの中で一番最新のレコードを示す 
        ->limit(1)
        ->first(); //レコード取得

      \DB::table('rests')->insert([
        'attendanced_id' => $attendanced_id->id,
        'date' => $currentDate,
        'start_time' => $currentTime
    ]);
    
      return('');
    }

    public function restEnd(){
      $user = Auth::user();

      $dt = Carbon::now();
      echo $dt->toDateString();
      $currentDate = $dt->toDateString();
      
      $time = Carbon::now();
      echo $time->toTimeString();
      $currentTime = $dt->toTimeString(); 

      $user_id = $user->id;
      $attendanced_id = 
      \DB::table('attendances')
        ->where('user_id', $user->id) 
        ->where('date', $currentDate) 
        ->whereNull('end_time') 
        ->latest('start_time') 
        ->limit(1)
        ->first(); 

      \DB::table('rests')
        ->where('attendanced_id', $attendanced_id->id)
        ->where('date', $currentDate)
        ->whereNull('end_time')
        ->latest('start_time')
        ->limit(1)
        ->update([
            'end_time' => $currentTime,
            'updated_at' => $dt
        ]);
      return(''); 
    }
}
