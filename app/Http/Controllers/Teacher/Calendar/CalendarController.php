<?php

namespace App\Http\Controllers\Teacher\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CalendarController extends Controller
{
  
    public function index()
    {
      
        return view('calendar.index');
    }
  
    public function api()
    {


        $data = [
            [
                // "id" => '37fd0b1c-5ae3-48c6-bb8d-e718632ce423',
                "title" => 'Bu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme BaşlığıBu Bir deneme Başlığı',
                "start"=> date("Y,m,d"),
                "className" => 'bg-success',

               
            ]

        ];

        return response()->json($data);
    }
}




