<x-layout> 

    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">  
      {{session('message')}}
    </div>
    @endif
    <div class="container container-login mt-5 " id="container">
        <div class="form-container sign-up-container">
            <form class="form-register" method="POST" action="{{route('register')}}">
              @csrf
                <h1>{{__('messages.Crea un Account')}}</h1>
                <span></span>
                <input type="text" placeholder="Name" name="name"/>

                <input type="email" placeholder="Email" name="email" />
                
                <input type="password" placeholder="password" name="password"/>
                <input type="password" placeholder="password confirmation" name="password_confirmation"/>
                <button  class="login-button" type="submit">{{__('messages.Registrati')}}</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form class="form-register" method="POST" action="{{route('login')}}">
                @csrf
                <h1>Login</h1>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="password" />
                <button class="login-button" type="submit">Login</button>
                <a class="mb-5" href="/forgot-password">{{__('messages.Hai dimenticato la password?')}}</a>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>{{__('messages.Bentornato!')}}</h1>
                    <p>{{__('messages.Per restare connesso con noi per favore inserisci le tue credenziali')}}</p>
                    <button  class="login-button ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>{{__('messages.Ciao')}}</h1>
                    <p>{{__('messages.Inserisci i tuoi dati ed entra a far parte della community TornoPresto.com')}}</p>
                    <button class="login-button ghost" id="signUp">{{__('messages.Registrati')}}</button>
                </div>
            </div>
        </div>
    </div>
</x-layout>