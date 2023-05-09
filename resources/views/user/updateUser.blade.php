<x-layout>
    <x-header
    title="{{__('messages.Aggiorna i dati dell Utente')}}"
    
    />
   
    @if(session('status')==='profile-information-updated')
    <div class="alert alert-success mb-4">
        <p>{{__('messages.Hai aggiornato il tuo profilo')}}</p>
    </div>
    @endif
    @if(session('status')==='password-updated')
    <div class="alert alert-success mb-4">
        <p>{{__('messages.Hai aggiornato la tua password')}}</p>
    </div>
    @endif
    <div class="container"> 
        <div class="row justify-content-center w-100">
            <a href="{{route('profile')}}" class="text-center"><small>{{__('messages.Torna indietro')}}</small> </a>
        </div>
    
        <div class="row justify-content-center text-center border-form ">    
            
            <div class="col-12 col-md-6 my-5">
                
                <div class="mb-3">
                    <h2 class="text-uppercase d-inline yellow-border-bottom">{{__('messages.Aggiorna informazioni')}}</h2>
                </div>
    
                <form method="POST" action="/user/profile-information" class="">
                    @csrf
                    @method('put')
                    <div class="form-outline mb-4">
                        <input type="text" name="name" class="form-controll @error('name') is-inavalid @enderror" value="{{Auth::user()->name}}">
                        @error('name')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                        <label for="form-label">{{__('messages.Username')}}</label>
                    </div>
                    
                    <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-controll @error('email') is-inavalid @enderror" value="{{Auth::user()->email}}">
                        @error('email')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                        <label for="form-label">Email</label>
                    </div>
                    
                    <div class="pt-1 ">
                        <button class="btn btn-cta " type="submit">{{__('messages.Aggiorna dati')}}</button>
                    </div>
                </form>
            </div>
             
            <div class="col-12 col-md-6 my-5">
                <div class="mb-3">
                    <h2 class="text-uppercase d-inline yellow-border-bottom">{{__('messages.Aggiorna password')}}</h2>
                </div>
                
                <form method="POST" action="/user/password">
                    @csrf
                    @method('put')
                    <div class="form-outline mb-4">
                        <input type="password" name="current_password" class="form-controll @error('current_password') is-inavalid @enderror">
                        @error('current_password')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                        <label for="form-label">{{__('messages.Password attuale')}}</label>
                    </div>
                    
                    <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-controll @error('password') is-inavalid @enderror">
                        @error('password')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                        <label for="form-label">{{__('messages.Nuova Password')}}</label>
                    </div>
                    
                    <div class="form-outline mb-4">
                        <input type="password" name="password_confirmation" class="form-controll @error('password_confirmation') is-inavalid @enderror">
                        @error('password_confirmation')
                        <span class="text-danger small">{{$message}}</span>
                        @enderror
                        <label for="form-label">{{__('messages.Password da confermare')}}</label>
                    </div>
                    
                    <div class="pt-1 ">
                        <button class="btn btn-cta " type="submit">{{__('messages.Aggiorna password')}}</button>
                    </div>
                </form>
            </div>
            
        </div>  
    </div>
</div> 

</x-layout>