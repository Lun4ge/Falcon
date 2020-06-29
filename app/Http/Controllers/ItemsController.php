<?php

namespace App\Http\Controllers;

use App\items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $all = items::select()->get();
        return view('dados.items.localtable')->with(compact("all"));
    }

    public function delete($id)
    {
        $all=items::select()->get();
        $only=items::where(['id'=>$id])->first();
        return view('dados.items.delete')->with(compact("all","only")); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomeitem' => 'required|max:100|unique:items',
            'precoitem' => 'required',
        ]);
        
        $data = $request->all();
        $items = new items();
        $items->nomeitem=$data['nomeitem'];
        $items->precoitem=$data['precoitem'];
        $items->descriitem=$data['descriitem'];
        $items->user_id = Auth()->user()->id;
        $items->save();
        
        return redirect('/items');
    }

    public function unique($id)
    {
        $all=items::select()->get();
        $only=items::where(['id'=>$id])->first();
        return view('dados.items.show')->with(compact("all","only")); 
    }

    public function edit($id)
    {
        $all=items::select()->get();
        $only=items::where(['id'=>$id])->first();
        return view('dados.items.edit')->with(compact("all","only")); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomeitem' => 'required|max:100',
            'precoitem' => 'required',
        ]);

        $data = $request->all();
        items::where(['id'=>$id])->update([
        'nomeitem'=>$data['nomeitem'],
        'precoitem'=>$data['precoitem'],
        'descriitem'=>$data['descriitem'],
        ]);

        return redirect('/items');
    }

    public function destroy($id)
    {
        items::where(['id'=>$id])->delete();
        return redirect('/items');
    }
}
