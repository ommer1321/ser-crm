<?php

namespace App\Traits;

use App\Http\Requests\TaskFormRequest;
use App\Models\Grup\Grup;
use App\Models\Teacher\Task;
use Illuminate\Support\Facades\Auth;

trait GrupTrait
{

    use HelperTrait;

    public function listGrupDetails($grup_id)
    {
             $grup = Grup::where('grup_id',$grup_id)->with('members')->withCount('members')->with('teacher')->first();

             return $grup  ;
 
    }

    public function listGrupsWithMembers()
    {
             $grups = Grup::where('teacher_id',auth()->user()->id)->where('status',1)->with('members')->withCount('members')->get();

             return $grups ;
 
    }


    public function listMembers($grup_id)
    {
             $grup = Grup::where('teacher_id',auth()->user()->id)->where('status',1)->where('grup_id',$grup_id)->first();
            return $grup->members;
           
 
    }





}
