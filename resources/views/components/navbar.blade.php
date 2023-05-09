<nav class="navbar sticky-top navbar-expand-lg d-none d-lg-flex navbar-large" >
  <a href="{{route('homepage')}}" class="logo">
    <img src="{{Storage::url('img/logo_presto.png')}}" class="itzone-logo"/>
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      
      {{-- <li class="nav-item">
        
      </li>
      <li class="nav-item">
        
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{route('homepage')}}">{{__('messages.home')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('announcemnets.index')}}">{{__('messages.Tutti gli Annunci')}}</a>
      </li>
      
      <li class="dropdown nav-item">
        <a href="#" class="nav-link" id="no_linea">{{__('messages.Categorie')}}</a>
        <ul>
          <div class="row category-row">
            <div class="col-6 ">       
                @foreach ($categories as $category)
                  @if ($category->id <=5)
                    <li><a href="{{route('categoryShow', compact('category'))}}"><x-category-languages :category="$category"></x-category-languages></a></li>
                  @endif
                @endforeach  
                </div>
                <div class="col-6 ">
                  @foreach ($categories as $category)
                    @if ($category->id >=6 && $category->id <=10)
                      <li class=""><a href="{{route('categoryShow', compact('category'))}}"><x-category-languages :category="$category"></x-category-languages></a></li>
                    @endif
                  @endforeach  
                </div>
          </div>
    
  
          
    
      
      
        </ul>
      </li> 
      @if (Auth::user())
      <li class="nav-item">
        <a class="nav-link" href="{{route('annuncio.create')}}">{{__('messages.Crea il tuo annuncio')}}</a>
      </li>  
      @endif
      
      
      
    </ul>
  </div>
  @guest
  <div class="dropdown">
  
    <li id="flagContainer" class="btn p-0 " data-bs-toggle="dropdown" aria-expanded="false"><script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
      <lord-icon
          src="https://cdn.lordicon.com/zeabctil.json"
          trigger="hover"
          style="width:32px;height:32px">
      </lord-icon></li>

  
  <ul class="dropdown-menu">
    <li><x-_locale id="flagIta" lang="it" class="rounded-circle"/></li>
    <li><x-_locale id="flagEng" lang="en" class="rounded-circle"/></li>
    <li><x-_locale id="flagPor" lang="pt" class="rounded-circle"/></li>
  </ul>
</div>
  {{-- <a href="{{route('login')}}" class="btn-cta">
    Login
  </a> --}}
  <a href="{{route('login')}}" class="log">Login</a>
  @else
   <div class="dropdown">
  
    <li id="flagContainer" class="btn p-0 " data-bs-toggle="dropdown" aria-expanded="false"><script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
      <lord-icon
          src="https://cdn.lordicon.com/zeabctil.json"
          trigger="hover"
          style="width:32px;height:32px">
      </lord-icon></li>

  
  <ul class="dropdown-menu ">
    <div class="d-flex "><x-_locale  lang="it" class="rounded-circle">
    </x-_locale><p class="mt-2 ms-3">Italiano</p></div> 
    <div class="d-flex "><x-_locale  lang="en" class="rounded-circle">
    </x-_locale><p class="mt-2 ms-3">English</p></div> 
    <div class="d-flex "><x-_locale lang="pt" class="rounded-circle">
    </x-_locale><p class="mt-2 ms-3">Português</p></div> 
    
  </ul>
</div>
  <div class="dropdown">
    <button class="btn dropdown-toggle d-flex align-items-center " type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
      <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
      <lord-icon
      class="d-flex align-item-center "
      src="https://cdn.lordicon.com/dqxvvqzi.json"
      trigger="hover"
      style="width:32px;height:32px">  
      
    </lord-icon>
    <ul class="navbar-nav notifica">
      @if(Auth::user()->is_revisor)
      <li class="nav-item position-relative">
        <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">{{App\Models\Announcement::toBeRevisionedCount()}}<span class="visually-hidden">Unread Messages</span></span>
      </li>
      @endif
      
    </ul>
 
    <div class= "ms-2">
      {{Auth::user()->name}} 
    </div>
    
  </button>
  <ul class="dropdown-menu row" style="margin-left: 50px">
    
    
    <li class="nav-item">
      <a class="nav-link" href="{{route('profile')}}">{{__('messages.Profilo')}}</a>
    </li>
    @if(Auth::user()->is_revisor)
    <li class="nav-item ">
      <a class="nav-link position-relative" href="{{route('revisor.index')}}" aria-current="page">Zona revisore<span class="position-absolute top-80 start-100 translate-middle badge rounded-pill bg-danger">{{App\Models\Announcement::toBeRevisionedCount()}}<span class="visually-hidden">Unread Messages</span></span>
      </a>
    </li>
    @endif
    <li class="nav-item">
      
      <a class="nav-link" href="/logout" onclick="event.preventDefault(); document.querySelector('#form-logout').submit()">Logout</a>
      <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">@csrf</form>
      
    </li>
  </ul>
  </div>

@endguest

{{-- <li class="nav-item d-flex  ">
  <x-_locale lang="it" class="rounded-circle"/>
  <x-_locale lang="en" class="rounded-circle"/>
  <x-_locale lang="pt" class="rounded-circle"/>
</li> --}}
</nav>





{{-- NAVBAR MOBILE --}}

<nav class="navbar sticky-top navbar-expand-lg d-flex d-lg-none">
<a href="{{route('homepage')}}">
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/etqbfrgp.json"
    trigger="hover"
    style="width:32px;height:32px">
</lord-icon>
</a>
  <button class="btn d-flex align-items-center mx-auto position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> @if(Auth::user() && Auth::user()->is_revisor)
    <li class="nav-item position-absolute top-50 start-100 list-group-item">
      <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">{{App\Models\Announcement::toBeRevisionedCount()}}<span class="visually-hidden">Unread Messages</span></span>
    </li>
    @endif
    <div class="navbar-brand">
      
      <img src="{{Storage::url('img/logo_presto.png')}}" class="logoMobile"/>
      
    </div>
   
  </button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header pb-0">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Menu</h5>
    <button class="btn d-flex align-items-center " type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <lord-icon
    class="d-flex align-item-center ms-3"
    src="https://cdn.lordicon.com/dqxvvqzi.json"
    trigger="hover"
    style="width:32px;height:32px">  
    
    </lord-icon>
    </button>
    
    <div class="dropdown ">
      
      <ul class="dropdown-menu row positionDropdownUser">
        
        
        <li class="nav-item dropdown-item " >
          <a class="nav-link" role="button" data-bs-toggle="dropdown-user" aria-expanded="false" href="{{route('profile')}}">{{__('messages.Profilo')}}</a>
        </li>
        {{-- @if(Auth::user()->is_revisor) --}}
        <li class="nav-item dropdown-item">
          <a class="nav-link position-relative" href="{{route('revisor.index')}}" aria-current="page">Zona revisore<span class="position-absolute top-80 start-100 translate-middle badge rounded-pill bg-danger">{{App\Models\Announcement::toBeRevisionedCount()}}<span class="visually-hidden">Unread Messages</span></span>
          </a>
        </li>
        {{-- @endif --}}
        <li class="nav-item dropdown-item">
          
          <a class="nav-link" href="/logout" onclick="event.preventDefault(); document.querySelector('#form-logout').submit()">Logout</a>
          <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">@csrf</form>
          
        </li>
      </ul>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
 
  <div class="offcanvas-body ">
    <li class="nav-item d-flex  ">
      <x-_locale lang="it" class="rounded-circle"/>
      <x-_locale lang="en" class="rounded-circle"/>
      <x-_locale lang="pt" class="rounded-circle"/>
    </li>
    <ul class="decorationNavbarMobile">
      
      <li class="nav-item col-12">
        <a class="nav-link" href="{{route('homepage')}}">{{__('messages.home')}}</a>
      </li>
      <li class="nav-item col-12">
        <a class="nav-link" href="{{route('announcemnets.index')}}">{{__('messages.Tutti gli Annunci')}}</a>
      </li>
      
      <li class="dropdown  nav-item col-12">
        <a href="#" class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="no_linea">{{__('messages.Categorie')}}</a>
        <ul class="text-decoration-none decorationNavbarMobile dropdown-menu border border-0">
          @foreach ($categories as $category)
          <li class="dropdown-item"><a href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a></li>
          @endforeach
        </ul>
      </li> 
      
      @if (Auth::user())
      <li class="nav-item col-12">
        <a class="nav-link" href="{{route('contact')}}">{{__('messages.lavora con noi')}}</a>
      </li>
      <li class="nav-item col-12">
        <a class="nav-link" href="{{route('annuncio.create')}}">{{__('messages.Crea il tuo annuncio')}}</a>
      </li>  
      @endif
      @guest
      <div class=" altezzaBottone">
        <a href="{{route('login')}}" class="btn ms-2 btn-cta logMobile">Login</a>
      </div>
      @else   
    </ul>
  </div>
</div>

  
  {{-- <a href="{{route('login')}}" class="btn-cta">
    Login
  </a> --}}
  
  {{-- <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
  <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
  <lord-icon
  class="d-flex align-item-center ms-3"
  src="https://cdn.lordicon.com/dqxvvqzi.json"
  trigger="hover"
  style="width:32px;height:32px">  
  
  </lord-icon>
  
  <div class="dropdown">
    
    <ul class="dropdown-menu row" style="margin-left: 50px">
      
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('profile')}}">{{__('messages.Profilo')}}</a>
      </li>
      @if(Auth::user()->is_revisor)
      <li class="nav-item">
        <a class="nav-link position-relative" href="{{route('revisor.index')}}" aria-current="page">Zona revisore<span class="position-absolute top-80 start-100 translate-middle badge rounded-pill bg-danger">{{App\Models\Announcement::toBeRevisionedCount()}}<span class="visually-hidden">Unread Messages</span></span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        
        <a class="nav-link" href="/logout" onclick="event.preventDefault(); document.querySelector('#form-logout').submit()">Logout</a>
        <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">@csrf</form>
        
      </li>
    </ul>
  </div> --}}
  
  @endguest
</nav>












{{-- script icona occhio --}}
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script> 