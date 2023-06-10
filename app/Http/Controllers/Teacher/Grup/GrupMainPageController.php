<?php

namespace App\Http\Controllers\Teacher\Grup;

use App\Http\Controllers\Controller;
use App\Traits\Friendship;
use App\Traits\GrupTaskTrait;
use App\Traits\GrupTrait;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class GrupMainPageController extends Controller
{   
     use GrupTrait, Friendship, HelperTrait, GrupTaskTrait;


    
    public function index($grup_id)
    {

        $grupOfMembers = $this->grupOfMembers($grup_id);

        $grup =    $this->listGrupDetails($grup_id);

        $tasks = $this->grupOfTasks($grup_id);

        return view('grup.index', compact('tasks', 'grup', 'grupOfMembers'));
    }
}
