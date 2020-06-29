@extends('dados.indexmanage')
@section('info')
@include('dados.locais.searchjava')



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
          <th scope="row">{{$one->i}}</th>
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
              <form action="/locais/{{$one->id}}" method="POST">
                <button onClick="window.location.href='/locais/{{$one->id}}'" class="btnedit" type="button" Value="Detalhes"> <i class="fas fa-info"></i></button>
                <button onClick="window.location.href='/locais/{{$one->id}}/edit'" class="btnedit" type="button" Value="Editar"> <i class="fas fa-edit"></i></button>
                @csrf
                <button type="submit" value="Eliminar" class="btndelete"><i class="fas fa-trash"></i></button>
                </form>
              </td>
        </tr>
      @endforeach
    </tbody>
        </table>   
      </div>
      <div class="col-1"></div>
    </div>
    
{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}

<div class="container-fluid" style="visibility:visible;position:absolute;background-color:#1d1248;height:auto;width:30%;margin-left:25%;top:0%;margin-top:2%;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);" id="delete">
    <div style="color:#F8E08E;"><br>
    <h2 style="text-align: center;">Pretende mesmo eliminar {{$only->nomelocal}} ?</h2><br>
    </div>
  <form action="/locais/{{$only->id}}" method="POST" enctype="multipart/form-data" style="margin-left:30%;">
    @csrf
    @method('delete')
    <button type="submit" style="color:green;" class="btndelete" value="Eliminar" style="margin-bottom:5%;margin-top:5%;"><i class="fas fa-check"></i></button>
    <button type="button" style="color:red;" class="btndelete" onClick="window.location.href='/locais'" value="Cancelar" style="margin-bottom:5%;margin-top:5%;"><i class="fas fa-ban"></i></button>
  </form> <br>
</div>


   <script>
    function VoltarCriar()
    {var value = document.getElementById("Criar").value;
      window.location.href='/locais?criar='+value;}
    </script>
@endsection
