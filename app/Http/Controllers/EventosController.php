<?php

namespace App\Http\Controllers;

use App\eventos;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class EventosController extends Controller
{

    public function index()
    {
        $all = eventos::select()->get();
        return view('dados.eventos.localtable')->with(compact("all"));
    }

    public function create()
    {
        $all = eventos::select()->get();
        return view('dados.eventos.create');
    }

    public function delete($id)
    {
        $all=eventos::select()->get();
        $only=eventos::where(['idevento'=>$id])->first();
        return view('dados.eventos.delete')->with(compact("all","only"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomeevento' => 'required|max:100|unique:eventos'
        ]);
        
        $data = $request->all();
        $eventos = new eventos();
        $eventos->nomeevento=$data['nomeevento'];
        $eventos->horaevento=$data['horaevento'];
        $eventos->dataevento=$data['dataevento'];
        $eventos->descrievento=$data['descrievento'];
        $eventos->user_id = Auth()->user()->id;
        $eventos->save();
        
        return redirect('/eventos');
    }

    public function show($id)
    {
        $only=eventos::where(['idevento'=>$id])->first();
        $all=eventos::select()->get();
        return view('dados.eventos.show')->with(compact("all","only"));
    }

    public function edit($id)
    {
        $all=eventos::select()->get();
        $only=eventos::where(['idevento'=>$id])->first();
        return view('dados.eventos.edit')->with(compact("all","only"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
            
            $request->validate([
                'nomeevento' => 'required|max:100',
            ]);
            
            eventos::where(['idevento'=>$id])->update([
            'nomeevento'=>$data['nomeevento'],
            'dataevento'=>$data['dataevento'],
            'descrievento'=>$data['descrievento'],
            'horaevento'=>$data['horaevento'],
            ]);

            return redirect('/eventos');
    }

    public function destroy($id)
    {
        eventos::where(['idevento'=>$id])->delete();
        return redirect('/eventos');
    }
}
