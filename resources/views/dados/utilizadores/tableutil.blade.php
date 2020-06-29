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
              <th scope="col">Email</th>
              <th scope="col">Rank</th>
              <th scope="col">Criador</th>
              <th scope="col"></th>
            </tr>
          </thead>
         
          <tbody style="background-color: white">
          @foreach ($all as $one)
            <tr>
              <th scope="row">{{$one->id}}</th>
              <td>{{$one->name}}</td>
              <td>{{$one->email}}</td>
              <td>{{$one->lvluser}}</td>
              @if($one->lvluser == "Comum")
                 <td>{{$one->creatoruser}}</td>
              @else
                 <td>-</td>
              @endif
              <td>
                  <button type="button" style="padding-left: -2%;" class="btnedit" onClick="window.location.href='/users/{{$one->id}}/edit'" value="Editar"><i class="fas fa-edit"></i></button>
                  <button type="submit" class="btndelete" value="Eliminar" onclick="window.location.href='users/{{$one->id}}/delete'"><i class="fas fa-trash"></i></button>
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
                      <th scope="col" style="text-align: center;"><b>Criar Utilizador</b></th>
                    </tr>
                  </thead>
                  <tbody style="background-color: white">
                    <td scope="row">
                      <i class="fas fa-user-plus" style="font-size: 65px;margin-left:32.5%;margin-right:32.5%;margin-top:5%;margin-bottom:5%;"></i>
                      <div class="" style="padding-top: 5%;padding-bottom: 2%;margin-right:10%;margin-left:10%;">
                      <form method="POST" action="{{route('register')}}" enctype="multipart/form-data"> 
                        @csrf
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nome" style="margin-bottom: -3%;"><br>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" style="margin-bottom: -3%;"><br>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Senha" style="margin-bottom: 3%;">
                   
                    <div class="form-check" style="vertical-align: middle;">
                      <input class="" style=" " type="checkbox" name="mostrar" id="mostrar" onclick="myFunction()">
                      <label class="" for="mostrar" style="color: #111;"><b>Mostrar senha</b></label>
                  </div>
                    <input type="submit" value="Confirmar" class="btnConfirmarAdd" style="margin-left: 15%;margin-right:15%;margin-top:8%;margin-bottom:5%;">
                  </form></div>
                  
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