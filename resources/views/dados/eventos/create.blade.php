@extends('dados.indexmanage')
@section('info')
<div class="container">
 <div class="row">
          <div class="col-4">
            <form action="{{url('/eventos')}}" method="POST" enctype="multipart/form-data">
              @csrf
                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="nomeevento" id="nomeevento" placeholder="Nome">
                  <input type="date" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="dataevento" id="dataevento">
                    <br>
                  <textarea class="form-control" aria-label="With textarea" name="descrievento" id="descrievento" placeholder="Descrição"></textarea>
                
                  <input type="submit" class="form-control" value="Introduzir" aria-label="Username" aria-describedby="basic-addon1">
            </form>  
          </div>     
    </div>
  </div>
  @endsection
