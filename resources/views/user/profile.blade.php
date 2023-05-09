<x-layout>
    <x-header
        title="{{__('messages.Profilo utente')}}"
    />
    <div id="MobileView">
        <div id="Content">
          <div id="UserImg"></div>
          <h3 id="Title">{{__('messages.Profilo di')}}: <strong class="text-uppercase">{{Auth::user()->name}}</strong></h3>
      
          <nav>
            <a href="#" title="">{{__('messages.Informazioni')}}</a>
            <a href="#" title="">{{__('messages.Utente')}}</a>
          </nav>
      
          <div class="HR"></div>
      
          <menu>
            <ul>
              <li>
                <div id="Icon"><i class="fa-solid fa-user"></i></div>
                <div id="Content">
                  <h4>{{__('messages.Nome utente')}}</h4>
                  <span>{{Auth::user()->name}}</span>
                </div>
              </li>
              
              <li>
                <div id="Icon"><i class="fa-solid fa-envelope"></i></div>
                <div id="Content">
                  <h4>Email</h4>
                  <span>{{Auth::user()->email}}</span>
                </div>
              </li>
              
              <li>
                <div id="Icon"><i class="fa-solid fa-certificate"></i></div>
                <div id="Content">
                  <h4>{{__('messages.Verificato')}}:</h4>
                  <span><i class="{{Auth::user()->email_verified_at ? 'fa-sharp fa-solid fa-circle-check text-success' : 'fa-solid fa-circle-xmark text-danger'}}"></i></span>
                </div>
              </li>
              
              
              
            </ul>
          </menu>    
          <a href="{{route('user.update')}}" class="mx-auto btn btn-cta">{{__('messages.Aggiorna il Profilo Utente')}}</a>
        </div>
    
      </div>

</x-layout>