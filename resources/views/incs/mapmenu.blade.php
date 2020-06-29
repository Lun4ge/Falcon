
<?php $contid = 0 ?>
@foreach ($alllocais as $one)
    <?php $Ids[$contid] = array($one->id);$contid++?>
@endforeach

<script>
var Ids = <?php echo json_encode($Ids); ?>;

function openNav() {
  document.getElementById("mySidebar").style.width = "15%";
  document.getElementById("main").style.marginLeft = "15%";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
} 

window.onscroll = function() {
    document.getElementById("mySidebar").style.width = "0";
    for(let i = 0; i < Ids.length; i++){
        document.getElementById("id"+Ids[i]).style.width = "0%";
      }}
</script>
@include('incs.mapmenusearch')

<?php $CarouselInner = 0; ?>
<div id="mySidebar" class="sidebar" style="margin-bottom:20%;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <div class="carousel slide" data-ride="carousel" style="padding:15px">
    <div class="carousel-inner">
    @foreach ($alllocais as $local)
    @if ($local->imagelocal != "semimagem.png")
        @if ($CarouselInner == 0)

          <div class="carousel-item active">
            <img src="{{asset('/fotolocais/'.$local->imagelocal)}}" style="width:100%;height:150px">
          </div>
          <?php $CarouselInner++; ?> 

        @else

        <div class="carousel-item">
          <img src="{{asset('/fotolocais/'.$local->imagelocal)}}"  style="width:100%;height:65%">
        </div>

        @endif
        @else
           
        @endif
    @endforeach
  </div>  
 </div>

 <form action="#" method="get" style="">
  <div class="input-group">
      <br>
      <input class="form-control" id="system-search" name="q" placeholder="Procurar" style="margin-left:5%;margin-right:5%;bottom:0;" required>
  </div>
</form><br>

 <table class="table table-list-search" style="width: 100%;margin-left:5%">
    <tbody style="background-color: white">
    @foreach ($alllocais as $local)
    <tr>
        <td scope="row" style="vertical-align: baseline;"> 
          @switch($local->tipolocal)
                 @case("Policia")
                 <img src="{{asset('/images/iconsTable/Pred.png')}}" class="iconimagem">
                  @break
                  @case("Restaurante")
                  <img src="{{asset('/images/iconsTable/Rest.png')}}" class="iconimagem">
                  @break
                  @case("Alojamento")
                  <img src="{{asset('/images/iconsTable/Alu.png')}}" class="iconimagem">
                  @break
                  @case("Casa de Vinhos")
                  <img src="{{asset('/images/iconsTable/CVinhos.png')}}" class="iconimagem">
                  @break
                  @case("Escola")
                  <img src="{{asset('/images/iconsTable/Escola.png')}}" class="iconimagem">
                  @break
                  @case("Farmacia")
                  <img src="{{asset('/images/iconsTable/Farm.png')}}" class="iconimagem">
                  @break
                  @case("Centro de Saude")
                  <img src="{{asset('/images/iconsTable/CSaude.png')}}" class="iconimagem">
                  @break
                  @case("Bomba de Gasolina")
                  <img src="{{asset('/images/iconsTable/Bomba.png')}}" class="iconimagem"> 
                  @break
          @endswitch
        </td>
        <td><div style="margin-left: 3%;vertical-align: baseline;">{{$local->nomelocal}}</div></td>
        <td><button onclick="getElementById('id'+{{$local->id}}).style.width = '30%'" class="buttonformap" href="javascript:void(0)"><i class="fas fa-map-marker"></i></button></td>
        @foreach ($local->items as $item)
           <td style="visibility: hidden;font-size: 0.01%;">{{$item->nomeitem}}</td>
        @endforeach
      </tr>
    @endforeach
  </tbody>
      </table>   
</div>