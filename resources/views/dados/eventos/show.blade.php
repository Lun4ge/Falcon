
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
              <th scope="col">Data</th>
              <th scope="col">Criador</th>
              <th scope="col"></th>
              </tr>
            </thead>
           
            <tbody style="background-color: white">
            @foreach ($all as $one)
              <tr>
                <th scope="row">{{$one->idevento}}</th>
                <td>{{$one->nomeevento}}</td>
                <td>{{$one->dataevento}}</td>
                <td>{{$one->users->name}}</td>
                <td>
                  <button type="button" style="padding-left: -2%;" class="btnedit" onClick="window.location.href='/eventos/{{$one->idevento}}'" value="Detalhes"><i class="fas fa-info"></i></button>
                  <button type="button" style="padding-left: -2%;" class="btnedit" onClick="window.location.href='/eventos/{{$one->idevento}}/edit'" value="Editar"><i class="fas fa-edit"></i></button>
                  <button type="submit" class="btndelete" value="Eliminar" onClick="window.location.href='/eventos/{{$one->idevento}}/delete'"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
            @endforeach
            </tbody>
              </table>
            </div> 
              <div class="col-2">

                <div class="container">
                    <table class="table" style="color:#1d1248;">
                      <thead>
                        <tr style="background-color:#F8E08E;">
                          <th scope="col" style="text-align: center;"><b>Evento</b></th>
                        </tr>
                      </thead>
                      <tbody style="background-color: white">
                        <td scope="row">
                            <h5 style="text-align: center;margin-bottom:5%;margin-top:5%;"><b>{{$only->nomeevento}}</b></h5>
                            <div class="" style="padding-top: 5%;padding-bottom: 10%;margin-right:10%;margin-left:10%;">
                              <h6>Data : {{$only->dataevento}}</h6>
                              <h6>Hora : {{$only->horaevento}}</h6>
                              <h6>Descrição : {{$only->descrievento}}</h6>
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
                        <th scope="col" style="text-align: center;"><b>Criar Evento</b></th>
                      </tr>
                    </thead>
                    <tbody style="background-color: white">
                      <td scope="row">
                        <i class="fas fa-calendar-plus" style="font-size: 65px;margin-left:32.5%;margin-right:32.5%;margin-top:5%;margin-bottom:5%;"></i>
                        <div class="" style="padding-top: 5%;padding-bottom: 2%;margin-right:10%;margin-left:10%;">
                          <form action="{{url('/eventos')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input type="text" class="form-control"  name="nomeevento" id="nomeevento" placeholder="Nome" style="margin-bottom: -5%;"><br>
                                <input type="date" class="form-control"  name="dataevento" id="dataevento" style="margin-bottom: -5%;"><br>
                                <input type="time" class="form-control"  name="horaevento" id="horaevento" style="margin-bottom: -5%;"><br>
                                <textarea class="form-control" aria-label="With textarea" name="descrievento" id="descrievento" placeholder="Descrição"></textarea><br>
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