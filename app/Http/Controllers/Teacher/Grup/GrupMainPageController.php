<?php

namespace App\Http\Controllers\Teacher\Grup;

use App\Http\Controllers\Controller;
use App\Traits\Friendship;
use App\Traits\GrupNewsCommentTrait;
use App\Traits\GrupNewsTrait;
use App\Traits\GrupTaskTrait;
use App\Traits\GrupTrait;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class GrupMainPageController extends Controller
{
    use GrupTrait, Friendship, HelperTrait, GrupTaskTrait, GrupNewsTrait, GrupNewsCommentTrait;



    public function index($grup_id)
    {
        $grup =    $this->listGrupDetails($grup_id);

        $isGrupMember = $this->isGrupMember($grup);

        if ($isGrupMember == false) {
            return redirect()->back();
          }
          
        $mySharedTasks =  $this->mySharedGrupTasks($grup_id);

        $news = $this->listGrupNews($grup_id);

        $grupOfMembers = $this->grupOfMembers($grup_id);


        $tasks = $this->grupOfTasks($grup_id);


        return view('grup.index', compact('mySharedTasks', 'tasks', 'grup', 'grupOfMembers', 'news'));
    }
}
