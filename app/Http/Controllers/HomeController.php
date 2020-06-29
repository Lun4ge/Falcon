<?php

namespace App\Http\Controllers;

use App\eventos;
use App\locais;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
       //$this->middleware('auth');
    }

    public function mapview()
    {
        return view('dados.index',[
            'alllocais' => locais::select()->get(),
            'alleventos' => eventos::orderBy('dataevento','ASC')->get()
        ]);
    }
}
