<?php

namespace App\Http\Controllers\Teacher\Grup;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupFormRequest;
use App\Models\Grup\Grup;
use App\Models\Grup\Member;
use App\Models\User;
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
        $users = $this->students();
        return view('grup.create',compact('users'));
    }

    public function store(GrupFormRequest $request)
    {
        $grup = new Grup();
   
        $validetedData = $request->validated();
     
      return     $this->storeGrup($validetedData , $grup);

        
   

  
    }


    public function settings($grup_id)
    {


        $grup =    $this->listGrupDetails($grup_id);
        return view('grup.settings', compact('grup'));
    }
}
