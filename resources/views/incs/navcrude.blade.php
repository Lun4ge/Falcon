
                <div class="sidenav" >
                    @guest
                    @else
                    
                    <div class="container-fluid">
                        <a href="/" class="sidenavsize" style="margin-bottom:5%"><i class="fas fa-caret-left" style="margin-right:5px;"></i>  Voltar</a><br>
                    <img src="{{asset('images/icons/iconLogo.png')}}" alt="imagemLogo" style="width:100%;margin-bottom:10%;">
                    <br>
                    <form action="#" method="get" style="margin-bottom:30%;">
                        <div class="input-group">
                            <br>
                            <input class="form-control" id="system-search" name="q" placeholder="Procurar" style="" required>
                        </div>
                      </form>
@if(auth()->user()->Admin())
    <a href="/users"class="sidenavsize"><i class="fas fa-address-card" style="margin-right:5px;"></i>  Utilizadores</a><br>
@endif
                        <a href="/locais" class="sidenavsize"><i class="fas fa-map-marker-alt" style="margin-right:5px;"></i>  Locais</a><br>
                        <a href="/eventos" class="sidenavsize"><i class="fas fa-calendar-alt" style="margin-right:5px;"></i>  Eventos</a><br>
                        <a href="/items" class="sidenavsize"><i class="fas fa-box" style="margin-right:5px;"></i>  Items</a><br>
                  
                              <a class="" href="{{ route('logout') }}" style="bottom:0;position:absolute;margin-bottom:20px"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  <div class="sidenavsize"><i class="fas fa-sign-out-alt" style="margin-right:5px;"></i>  Sair</div>
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form><br>
                            </div>
                     @endguest
                  </div>

