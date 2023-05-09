<x-layout>
    <x-header
        title="{{__('messages.Verifica la tua mail')}}"
    />
    <div class="container-fluid my-5 min-vh-100">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="lc-block mb-5">
                    <h2 class="display-6 text-uppercase d-inline yellow-border-bootom">{{__('messages.Grazie per esserti iscritto')}}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <p>{{__('messages.Prima di iniziare, verifica il tuo indirizzo email cliccando sul link che ti abbiamo inviato!')}}</p>
                @if (session('status') == 'verification-link-sent')
                    <div class="my-4  text-success">
                        {{__('messages.Ti abbiamo inviato una nuova mail di registrazione')}}
                    </div>    

                @endif
                <form method="POST" action="{{route('verification.send')}}">
                    @csrf
                    <button class="btn-cta btn-lg btn-block my-5" type="submit">{{__('messages.Invia una nuova mail di verifica')}}</button>
                </form>
                
                
                <p>{{__('messages.Stai riscontrando problemi di connessione?')}}</p><a class="btn btn-dark "  href="/logout" onclick="event.preventDefault(); document.querySelector('#form-logout').submit()">Logout</a>
                    <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">@csrf</form>

                
            </div>
        </div>
    </div>
</x-layout>