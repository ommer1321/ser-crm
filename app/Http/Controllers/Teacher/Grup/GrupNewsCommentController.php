<?php

namespace App\Http\Controllers\Teacher\Grup;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupNewsCommentFormRequest;
use App\Http\Requests\GrupNewsFormRequest;
use App\Models\User;
use App\Traits\GrupNewsCommentTrait;
use App\Traits\GrupNewsTrait;
use Illuminate\Http\Request;

class GrupNewsCommentController extends Controller
{
    use GrupNewsCommentTrait;

    public function store(GrupNewsCommentFormRequest $request)
    {
     
           $checkUserMemberToGrup  =  $this->checkUserMemberToGrup($request);
      
      if(! $checkUserMemberToGrup){
  
        return redirect()->back()->with('failed', ' Bu Grupta Yorum Yapamazsınız');
  
      }
  
  
       $res = $this->storeGrupNewsComment($request);
  
      if ($res) {
  
        return redirect()->back()->with('success', 'Yorum Başarılı');
      } else {
  
        return redirect()->back()->with('failed', 'Opss! Yorum Başarısız');
      }
    
   
}

}
