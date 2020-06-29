@extends('dados.indexmanage')
@section('info')
<div class="container">
 <div class="row">
          <div class="col-4">
            <form action="{{url('/items')}}" method="POST" enctype="multipart/form-data">
              @csrf
                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="nomeitem" id="nomeitem" placeholder="Nome">
                    <br>
                  <textarea class="form-control" aria-label="With textarea" name="descriitem" id="descriitem" placeholder="Descrição"></textarea>
                  <input type="number" class="form-control" name="precoitem" id="precoitem" value="20" aria-label="Username" aria-describedby="basic-addon1">
                  <input type="submit" class="form-control" value="Introduzir" aria-label="Username" aria-describedby="basic-addon1">
            </form>  
          </div>     
    </div>
  </div>
  @endsection
