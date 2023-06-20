<?php

namespace App\Http\Controllers\Teacher\Grup;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupNewsDeleteRequest;
use App\Http\Requests\GrupNewsFormRequest;
use App\Models\Grup\GrupNews;
use App\Models\User;
use App\Traits\GrupNewsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GrupNewsController extends Controller
{
    use GrupNewsTrait;

    function store(GrupNewsFormRequest $request, $grup_id)
    {
        $isStoredNews = $this->storeNews($request, $grup_id);

        if ($isStoredNews == true) {

            return redirect()->back()->with('success', 'Haber Paylaşıldı');
        }
        if ($isStoredNews  == false) {

            return redirect()->back()->with('failed', 'Opss! Bir Sorun Oluştu');
        }

        return $request->validated();
    }




    function delete(GrupNewsDeleteRequest $request)
    {
         $isGrupTeacherOrNewsOwner =  $this->isGrupTeacherOrNewsOwner($request);

        if ($isGrupTeacherOrNewsOwner == false) {
           
            return redirect()->back()->with('failed', 'Yetkiniz Yok');
        }


        $isDeletedNews = $this->deleteNews($request);
            
        if ($isDeletedNews == true) {

            return redirect()->back()->with('success', 'Haber Kaldırıldı');
        }
        if ($isDeletedNews  == false) {

            return redirect()->back()->with('failed', 'Opss! Bir Sorun Oluştu Haber Kaldırılamadı');
        }
    }
}
