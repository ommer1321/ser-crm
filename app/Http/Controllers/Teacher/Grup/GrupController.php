<?php

namespace App\Http\Controllers\Teacher\Grup;

use App\Http\Controllers\Controller;
use App\Models\Grup\Grup;
use App\Traits\GrupTrait;
use Illuminate\Http\Request;

class GrupController extends Controller
{
    use GrupTrait;

    public function index()
    {
      
           $grups = $this->listGrupsWithMembers();

        return view('grup.index', compact('grups'));
    }

    public function create()
    {
        return view('grup.create');
    }

    public function settings($grup_id)
    {

     
      $grup =    $this->listGrupDetails($grup_id);
        return view('grup.settings',compact('grup'));
    }


}



