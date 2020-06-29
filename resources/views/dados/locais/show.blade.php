@extends('dados.indexmanage')
@section('info')

<div class="row" style="position: relative">
    <div class="col-1"></div>
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
              <button onClick="VoltarCriar()" class="btncriar" value="abrir" id="Criar">Criar Local</button>
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
                    <button onClick="window.location.href='/locais/{{$one->id}}'" class="btnedit" type="button" Value="Detalhes"> <i class="fas fa-info"></i></button>
                    <button onClick="window.location.href='/locais/{{$one->id}}/edit'" class="btnedit" type="button" Value="Editar"> <i class="fas fa-edit"></i></button>
                    <button type="submit" value="Eliminar" class="btndelete" onClick="window.location.href='/locais/{{$one->id}}/delete'"><i class="fas fa-trash"></i></button>
                  </td>
            </tr>
          @endforeach
        </tbody>
            </table>   
          </div>
          <div class="col-1"></div>
        </div>
        
    {{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    
    <div class="container-fluid" style="visibility:visible;position:absolute;background-color:#1d1248;height:80%;width:30%;margin-left:25%;top:0%;margin-top:2%;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);" id="show">
      {{-- height:auto interfere com o mapa --}}
      <div id="map" style="border-radius: 15px;margin-top:8%;margin-bottom:2%;margin-left:4%;margin-right:4%;"></div><br>
      <form action="/locais/{{$only->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row" style="margin-right:4%;margin-left:4%;">
          <div class="col-12">
          <input type="text" class="form-control" name="nomelocal" id="nomelocal" placeholder="Nome" value="{{$only->nomelocal}}" readonly></div>
        </div><br>
    
        <div class="row" style="margin-right:4%;margin-left:4%;margin-top:-2%;">
          <div class="col-6">
            <input type="text" class="form-control" name="emaillocal" id="emaillocal" placeholder="Email" style="width: 100%" value="{{$only->emaillocal}}" readonly>
          </div>
          <div class="col-6">
            <input type="text" class="form-control" name="telelocal" id="telelocal" placeholder="Telefone" style="width: 100%" value="{{$only->telelocal}}" readonly>
          </div>
        </div><br>
    
        <div class="row" style="margin-right:4%;margin-left:4%;margin-top:-2%;">
    <div class="col-4">
      <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="{{$only->Latitude}}" readonly>
    </div>
    <div class="col-4">
      <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude" value="{{$only->Longitude}}" readonly>
    </div>
    <div class="col-4">
      <select id="type" class="form-control" name="type" readonly>
          @if($only->tipolocal=="Restaurante"){<option value="Restaurante" selected>Restaurante</option>}@else{<option value="Restaurante">Restaurante</option>}@endif
          @if($only->tipolocal=="Alojamento"){<option value="Alojamento" selected>Alojamento</option>}@else{<option value="Alojamento">Alojamento</option>}@endif
          @if($only->tipolocal=="Casa de Vinhos"){<option value="Casa de Vinhos" selected>Casa de Vinhos</option>}@else{<option value="Casa de Vinhos">Casa de Vinhos</option>}@endif
          @if($only->tipolocal=="Bomba de Gasolina"){<option value="Bomba de Gasolina" selected>Bomba de Gasolina</option>}@else{<option value="Bomba de Gasolina">Bomba de Gasolina</option>}@endif
          @if($only->tipolocal=="Escola"){<option value="Escola" selected>Escola</option>}@else{<option value="Escola">Escola</option>}@endif
          @if($only->tipolocal=="Farmacia"){<option value="Farmacia" selected>Farmacia</option>}@else{<option value="Farmacia">Farmacia</option>}@endif
          @if($only->tipolocal=="Policia"){<option value="Policia" selected>Policia</option>}@else{<option value="Policia">Policia</option>}@endif
          @if($only->tipolocal=="Centro de Saude"){<option value="Centro de Saude" selected>Centro de Saude</option>}@else{<option value="Centro de Saude">Centro de Saude</option>}@endif
      </select>
    </div>
        </div><br>
    
        <div class="row" style="margin-right:4%;margin-left:4%;margin-top:-2%;"> 
    <div class="col-5">
      <select id='custom-headers' multiple name="id[]" class="form-control" readonly>

        @foreach ($allitems as $item)
        @if($only->items->contains($item->id))
        <option value='{{$item->id}}' selected >{{$item->nomeitem}}</option>
        @else
        <option value='{{$item->id}}'>{{$item->nomeitem}}</option>
        @endif
        @endforeach
    
      </select>
    </div>
    <div class="col-7">
      <textarea class="form-control" name="descrilocal" id="descrilocal" placeholder="Descrição" rows="3" readonly>{{$only->descrilocal}}</textarea>
    </div>
        </div><br>
    
        <div class="row" style="margin-right:4%;margin-left:4%;padding-bottom:;">
        <div class="col-8"></div>
        <div class="col-1"></div>
        <div class="col-3">
          <button onClick="window.location.href='/locais'" class="form-control"><i class="fas fa-ban"></i></button>
        </div>
        </div>
      </form>  
    </div>

    @include('maps.mapshow')
    @include('dados.locais.searchjava')
@endsection