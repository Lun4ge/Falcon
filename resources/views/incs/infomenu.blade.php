
@foreach ($alllocais as $indi)

<div class="infobar" id="id{{$indi->id}}" style="border-radius: 0px 20px 0px 0px;">
  <div style="margin-top: -5%;">
       <h2 style="text-align:center;">{{$indi->nomelocal}}</h2>
       <hr style="margin-top: -1%;margin-left:15%;margin-right:15%;">
       <div class="row">
        <div class="col-6">
            
          @if (($indi->telelocal != "") && ($indi->emaillocal == ""))

              <h6 style="margin-left: 5%;">
               Contacto: {{$indi->telelocal}}
              </h6>

            @elseif(($indi->telelocal == "") && ($indi->emaillocal != ""))

              <h6 style="margin-left: 5%;">
               Contacto: {{$indi->emaillocal}}
              </h6>

            @elseif(($indi->telelocal != "") && ($indi->emaillocal != ""))

              <h6 style="margin-left: 5%;">
               Contacto: <br>
                {{$indi->telelocal}} / {{$indi->emaillocal}}
              </h6>

            @else
            <h6 style="margin-left: 5%;"></h6>
            @endif
              <textarea cols="20" rows="3" style="margin-left: 5%;margin-bottom:5%;" readonly>{{$indi->descrilocal}}</textarea>
            @foreach ($indi->items as $item)
             <span style="margin-left: 5%;background-color:#f5c315;color:#1d1248;padding:2%;font-size:11px;margin-bottom:5%;">{{$item->nomeitem}}</span>
            @endforeach
        </div>
         <div class="col-6"><br>
       @if($indi->imagelocal=="semimagem.png")
       <img src="{{asset('/fotolocais/'.$indi->imagelocal)}}" alt="imagem do local" style="width:90%;height:75%;margin-right:8%;">
       @else
       <img src="{{asset('/fotolocais/'.$indi->imagelocal)}}" alt="imagem do local" style="width:90%;height:75%;margin-right:8%;">
       @endif
      </div>
      </div>
    </div>
  </div>

@endforeach