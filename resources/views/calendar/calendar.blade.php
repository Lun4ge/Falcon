
<?php $contadorr=0; ?>
<div style="margin-top: 90%;margin-bottom:20%;">
  <h1 style="margin-left: 4.5%;color:#1d1248;"><b>EVENTOS</b></h1><br>
  <hr style="margin: 2%;">
    <div class="row" style="margin-left: 4.5%">
        @foreach ($alleventos as $evento)

        <?php  
          $nmeng = array('January', 'February','March','April','May','June','July','August','September','October','November','December');
          $nmpt = array('Janeiro', 'Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
          $mes = date("F", strtotime($evento->dataevento));
          $mes = str_ireplace($nmeng, $nmpt, $mes);
        ?> 

        @if($contadorr<4)
        <div class="card" id="cardimage">
            <div class="card-img-overlay">
            <h4 class="card-title"><b id="h4Card" style="font-size:20px;"><?php echo date("d", strtotime($evento->dataevento)) ?></b> <?php echo $mes ?></h4>
              <p class="card-text" style="font-size:15px;">{{$evento->nomeevento}}</p>
              <p class="card-text" style="font-size:10px;">{{$evento->descrievento}}</p>
              <p class="card-text" style="text-align: center;bottom:0%;">{{$evento->horaevento}}</p>
            </div></div>
            <?php $contadorr++; ?>

        @else

        <br>
        <div class="card" id="cardimage">
          <div class="card-img-overlay">
          <h4 class="card-title"><b id="h4Card"><?php echo date("d", strtotime($evento->dataevento)) ?></b> <?php echo $mes ?></h4>
          <p class="card-text">{{$evento->nomeevento}}</p>
          </div></div>
              <?php $contadorr=0; ?>

        @endif
        @endforeach
        <br>
        <hr style="margin-bottom: 2%;margin-left:2%;margin-right:2%;margin-top:10%;">
    </div>
    </div>
