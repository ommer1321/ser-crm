<?php

namespace App\Http\Controllers\Teacher\Grup;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupNewsFormRequest;
use App\Models\User;
use App\Traits\GrupNewsTrait;
use Illuminate\Http\Request;

class GrupNewsController extends Controller
{
    use GrupNewsTrait;

    function store(GrupNewsFormRequest $request , $grup_id)
    {
        $isStoredNews = $this->storeNews($request , $grup_id);
        if($isStoredNews == true){

            return redirect()->back()->with('success','Haber Paylaşıldı');
        }
        if($isStoredNews  == false){

            return redirect()->back()->with('failed','Opss! Bir Sorun Oluştu');

        }

         return $request->validated();
    }
}
