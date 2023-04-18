<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Models\Teacher\Task;
use Illuminate\Support\Facades\Auth;

trait HelperTrait
{


    public function redirectResultBack($Result)
    {
        if ($Result) {
            return redirect()->back()->with('success', 'Başarılı Bir Şekilde Tamamlandı');
        } else {
            return redirect()->back()->with('failed', 'Maalesef Başarısız');
        }
    }



 

    public function resultCheck($Result)
    {
      

        return $Result;
    }


  



}
