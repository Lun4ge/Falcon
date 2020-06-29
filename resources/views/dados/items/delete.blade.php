@extends('dados.utilizadores.indexutil')
@section('users')
@include('dados.utilizadores.searchjava')
<div class="row">
  <div class="col-1"></div>
<div class="col-8">
     <table class="table table-list-search" style="margin-right:10%;color:#1d1248;">
        <thead >
          <tr style="background-color:#F8E08E;color:#1d1248; ">
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Criador</th>
            <th scope="col"></th>
            </tr>
          </thead>
         
          <tbody style="background-color: white">
          @foreach ($all as $one)
            <tr>
              <th scope="row">{{$one->id}}</th>
              <td>{{$one->nomeitem}}</td>
              <td>{{$one->precoitem}} €</td>
              <td>{{$one->users->name}}</td>
              <td>
                <button type="button" style="padding-left: -2%;" class="btnedit" onClick="window.location.href='/items/{{$one->id}}/unique'" value="Detalhes"><i class="fas fa-info"></i></button>
                <button type="button" style="padding-left: -2%;" class="btnedit" onClick="window.location.href='/items/{{$one->id}}/edit'" value="Editar"><i class="fas fa-edit"></i></button>
                <button type="submit" class="btndelete" value="Eliminar" onClick="window.location.href='/items/{{$one->id}}/delete'"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          @endforeach
          </tbody>
            </table>  
          </div> 
            <div class="col-2">

              <div class="container">
                <table class="table" style="color:#1d1248;">
                  <thead >
                    <tr style="background-color:#F8E08E;">
                      <th scope="col" style="text-align: center;"><b>Eliminar Item</b></th>
                    </tr>
                  </thead>
                  <tbody style="background-color: white">
                    <td scope="row">
                      <i class="fas fa-trash" style="font-size: 65px;margin-left:32.5%;margin-right:32.5%;margin-top:5%;margin-bottom:5%;"></i>
                      <h5 style="text-align: center;margin-bottom:10%;">Deseja mesmo eliminar "{{$only->nomeitem}}" ?</h5>
                      <div class="" style="padding-top: 5%;padding-bottom: 2%;margin-right:10%;margin-left:10%;">
                        
                        <form action="/items/{{$only->id}}" method="POST" enctype="multipart/form-data" style="margin-left:22%;">
                            @csrf
                            @method('delete')
                            <button type="submit" style="color:green;" class="btndelete" value="Eliminar"><i class="fas fa-check"></i></button>
                            <button type="button" style="color:red;" class="btndelete" onClick="window.location.href='/items'" value="Cancelar"><i class="fas fa-ban"></i></button>
                        </form>   

                      </div>
                    </td>
                  </tbody>
                </table>
            </div>

              <br>
              <div class="container">
                <table class="table" style="color:#1d1248;">
                  <thead >
                    <tr style="background-color:#F8E08E;">
                      <th scope="col" style="text-align: center;"><b>Criar Item</b></th>
                    </tr>
                  </thead>
                  <tbody style="background-color: white">
                    <td scope="row">
                      <i class="fas fa-plus" style="font-size: 65px;margin-left:32.5%;margin-right:32.5%;margin-top:5%;margin-bottom:5%;"></i>
                      <div class="" style="padding-top: 5%;padding-bottom: 2%;margin-right:10%;margin-left:10%;">
                        <form action="{{url('/items')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                              <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="nomeitem" id="nomeitem" placeholder="Nome">
                                <br>
                              <textarea class="form-control" aria-label="With textarea" name="descriitem" id="descriitem" placeholder="Descrição"></textarea><br>
                              <input type="number" class="form-control" name="precoitem" id="precoitem" value="2" aria-label="Username" aria-describedby="basic-addon1"><br>
                              <input type="submit" value="Confirmar" class="btnConfirmarAdd" style="margin-left: 15%;margin-right:15%;margin-top:6%;margin-bottom:5%;">
                        </form>  
                      </div>
                    </td>
                  </tbody>
                </table>
            </div>

            <script>
                function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        } 
            </script>
          </div>
          <div class="col-2"></div>
        </div>
@endsection