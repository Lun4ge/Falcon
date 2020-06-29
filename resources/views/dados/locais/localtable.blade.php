@extends('dados.indexmanage')

@section('info')
@include('dados.locais.searchjava')



<div class="row" style="position: relative">
<div class="col-1">

</div>
<div class="col-10">

  <table class="table table-list-search">
    <thead style="background-color:#F8E08E;">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Telefone</th>
          <th scope="col">Criador</th>
          <th scope="col">Tipo</th>
          <th scope="col">
          <button onClick="DisplayCriar()" class="btncriar">Criar Local</button>
          </th>
        </tr>
      </thead>
     
      <tbody style="background-color: white">
      @foreach ($all as $one)
        <tr>
          <th scope="row">{{$one->id}}</th>
          <td>{{$one->nomelocal}}</td>
          
          @if($one->emaillocal != "")
             <td>{{$one->emaillocal}}</td>
             @else
             <td>-</td>
          @endif

          @if($one->telelocal != "")
          <td>{{$one->telelocal}}</td>
          @else
          <td>-</td>
       @endif

          <td>{{$one->users->name}}</td>
          <td>{{$one->tipolocal}}</td>
            <td> 
              {{-- <form action="" method="POST"> --}}
                <button onClick="window.location.href='/locais/{{$one->id}}'" class="btnedit" type="button" Value="Detalhes"> <i class="fas fa-info"></i></button>
                <button onClick="window.location.href='/locais/{{$one->id}}/edit'" class="btnedit" type="button" Value="Editar"> <i class="fas fa-edit"></i></button>
                <button type="submit" value="Eliminar" class="btndelete" onClick="window.location.href='/locais/{{$one->id}}/delete'"><i class="fas fa-trash"></i></button>
                {{-- </form> --}}
              </td>
        </tr>
      @endforeach
    </tbody>
        </table>   

      </div>
      <div class="col-1">
  
      </div>
    </div>

<div class="container-fluid" style="visibility:hidden;position:absolute;background-color:#1d1248;height:80%;width:30%;margin-left:25%;top:0%;margin-top:2%;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);" id="criar">
  <div id="map" style="border-radius: 15px;margin-top:8%;margin-bottom:2%;margin-left:4%;margin-right:4%;"></div><br>
  <form action="{{url('/locais')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row" style="margin-right:4%;margin-left:4%;">
      <div class="col-12">
      <input type="text" class="form-control" name="nomelocal" id="nomelocal" placeholder="Nome"></div>
    </div><br>

    <div class="row" style="margin-right:4%;margin-left:4%;margin-top:-2%;">
      <div class="col-6">
        <input type="text" class="form-control" name="emaillocal" id="emaillocal" placeholder="Email" style="width: 100%">
      </div>
      <div class="col-6">
        <input type="text" class="form-control" name="telelocal" id="telelocal" placeholder="Telefone" style="width: 100%">
      </div>
    </div><br>

    <div class="row" style="margin-right:4%;margin-left:4%;margin-top:-2%;">
<div class="col-4">
  <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude">
</div>
<div class="col-4">
  <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude">
</div>
<div class="col-4">
  <select id="type" class="form-control" name="type" >
    <option value="Restaurante">Restaurante</option>
    <option value="Alojamento">Alojamento</option>
    <option value="Casa de Vinhos">Casa de Vinhos</option>
    <option value="Bomba de Gasolina">Bomba de Gasolina</option>
    <option value="Escola">Escola</option>
    <option value="Farmacia">Farmacia</option>
    <option value="Policia">Policia</option>
    <option value="Centro de Saude">Centro de Saude</option>
  </select>
</div>
    </div><br>

    <div class="row" style="margin-right:4%;margin-left:4%;margin-top:-2%;"> 
<div class="col-5">
  <select id='custom-headers' multiple name="id[]" class="form-control">
    @foreach ($allitems as $item)
  <option value='{{$item->id}}'>{{$item->nomeitem}}</option>
    @endforeach
  </select>
</div>
<div class="col-7">
  <textarea class="form-control" name="descrilocal" id="descrilocal" placeholder="Descrição" rows="3"></textarea>
</div>
    </div><br>

    <div class="row" style="margin-right:4%;margin-left:4%;padding-bottom:;">
    <div class="col-8">
      <input type="submit" class="form-control btnsubmit" value="Introduzir">
    </div>
    <div class="col-1">
      <label class="upload" style="color: #F8E08E;font-size:15px;">
                 <i class="fas fa-upload"></i><input type="file" style="display: none;" name="imagelocal"> 
                  </label> 
    </div>
    <div class="col-3">
      <button onClick="DisplayCriar();return false;" class="form-control" class=""><i class="fas fa-ban"></i></button>
    </div>
    </div>
  </form>  
</div>

   <script>

window.onload = function() {
  iniCreate();
};

function iniCreate(){
    if(location.search.substring(1) == "criar=abrir"){
      document.getElementById("criar").style.visibility = "visible";
    }
  }

    function DisplayCriar() {
      if(location.search.substring(1) == "criar=abrir"){
        document.getElementById("criar").style.visibility = "hidden";
        window.location.href='/locais';
      }
      else{
      if(document.getElementById("criar").style.visibility == "visible"){
        document.getElementById("criar").style.visibility = "hidden";
      }else{
        document.getElementById("criar").style.visibility = "visible";
      }
    }}

    </script>

   @include('maps.mapcreate')
  @endsection