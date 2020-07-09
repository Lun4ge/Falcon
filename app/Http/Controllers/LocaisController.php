<?php

namespace App\Http\Controllers;

use App\items;
use App\locais;
use Illuminate\Http\Request;

class LocaisController extends Controller
{
    public function index()
    {
        $all = locais::select()->get();
        $allitems=items::select()->get();
        return view('dados.locais.localtable')->with(compact("all","allitems"));
    }

    public function create(){}

    public function store(Request $request)
    {
        $request->validate([
            'nomelocal' => 'required|max:100|unique:locais',
            'imagelocal' => 'sometimes|image|mimes:jpg,png,jpeg|max:5000',
            'lng' => 'required',
            'lat' => 'required',
            'id' => 'exists:items,id', 
        ]);
        
        $data = $request->all();
     
        if($data['type']=="Restaurante" || $data['type']=="Casa de Vinhos" || $data['type']=="Alojamento"
        || $data['type']=="Bomba de Gasolina"|| $data['type']=="Escola"|| $data['type']=="Farmacia" 
        ||$data['type']=="Centro de Saude"|| $data['type']=="Policia" ){

        $locais = new locais();
        $locais->nomelocal=$data['nomelocal'];
        $locais->emaillocal=$data['emaillocal'];
        $locais->telelocal=$data['telelocal'];
        $locais->descrilocal=$data['descrilocal'];
        $locais->tipolocal=$data['type'];

        $locais->Longitude=$data['lng'];
        $locais->Latitude=$data['lat'];
        $locais->user_id = Auth()->user()->id;

        if($request->has('imagelocal')){
            $img = $request->file('imagelocal');
            $imgname = time().'.'. $img->getClientOriginalExtension();
            $path = public_path('/fotolocais/');
            $img->move($path,$imgname);
            $locais->imagelocal=$imgname;
        }
        $locais->save();
        $locais->items()->attach(request('id'));
        
        return redirect('/locais');
    }
    }

    public function show($id)
    {
        return view('dados.locais.show',[
            'all' => locais::select()->get(),
            'allitems'=>items::select()->get(),
            'only'=>locais::where(['id'=>$id])->first(),
        ]);
    }

    public function edit($id)
    { 
        return view('dados.locais.edit',[
            'all' => locais::select()->get(),
            'allitems'=>items::select()->get(),
            'only'=>locais::where(['id'=>$id])->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
            $request->validate([
                'nomelocal' => 'required|max:100',
                'imagelocal' => 'sometimes|image|mimes:jpg,png,jpeg|max:5000',
                'lat' => 'required',
                'lng' => 'required',
            ]);

                $data = $request->all();
                if($request->has('imagelocal')){

                    $all=locais::where(['id'=>$id])->first();
                    unlink(public_path() .  '/fotolocais/' . $all->imagelocal);

                    $img = $request->file('imagelocal');
                    $imgname = time().'.'. $img->getClientOriginalExtension();
                    $path = public_path('/fotolocais/');
                    $img->move($path,$imgname);
                    $data['imagelocal']=$imgname;

            locais::where(['id'=>$id])->update([
            'nomelocal'=>$data['nomelocal'],
            'emaillocal'=>$data['emaillocal'],
            'telelocal'=>$data['telelocal'],
            'tipolocal'=>$data['type'],
            'descrilocal'=>$data['descrilocal'],
            'Latitude'=>$data['lat'],
            'Longitude'=>$data['lng'],
            'imagelocal'=>$imgname,]);
            }else{
                locais::where(['id'=>$id])->update([
                    'nomelocal'=>$data['nomelocal'],
                    'emaillocal'=>$data['emaillocal'],
                    'telelocal'=>$data['telelocal'],
                    'tipolocal'=>$data['type'],
                    'descrilocal'=>$data['descrilocal'],
                    'Latitude'=>$data['lat'],
                    'Longitude'=>$data['lng'],]);  
            }

            return redirect('/locais');
    }

    public function destroy($id)
    {
     $all=locais::where(['id'=>$id])->first();
     if($all->imagelocal != "semimagem.jpg" && $all->imagelocal != "semimagem.png" && $all->imagelocal != "semimagem.jpeg"){
        unlink(public_path() .  '/fotolocais/' . $all->imagelocal);
     }
        locais::where(['id'=>$id])->delete();
        return redirect('/locais');
    }

    public function delete($id)
    {
        return view('dados.locais.delete',[
            'all' => locais::select()->get(),
            'only'=>locais::where(['id'=>$id])->first(),
        ]);

    }

    protected function val_local_2add(){
        return request()->validate([
            'nomelocal' => 'required|max:100|unique:locais',
            'Longitude' => 'required',
            'Latitude' => 'required',
        ]);
    }

    protected function val_local_edit(){
        return request()->validate([
            'nomelocal' => 'required|max:100|unique:locais',
            'Longitude' => 'required',
            'Latitude' => 'required',
        ]);
    }
}
