<x-layout>
    <x-header
        title={{__('messages.Ecco i passaggi per recuperare la tua password')}}
    />
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
              
                <form method="POST" action="/reset-password">
                    @csrf
                    <input type="hidden" name="token" value="{{request()->route('token')}}">

                    <div class="form-outline mb-4">
                        <h2 class="text-center">{{__('messages.L email con cui ti sei registrato è')}}:</h2>
                        <input type="email" name="email" class="form-controll @error('email') is-inavalid @enderror" value="{{$request->email}}">
                        @error('email')
                            <span class="text-danger small">{{$message}}</span>
                        @enderror
                        <label for="form-label">Email</label>
                    </div>

                    <div class="form-outline mb-4">
                        <h2 class="text-center">{{__('messages.Inserisci la nuova password')}}</h2>
                        <input type="password" name="password" class="form-controll @error('password') is-inavalid @enderror">
                        @error('password')
                            <span class="text-danger small">{{$message}}</span>
                        @enderror
                        <label for="form-label">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                        <h2 class="text-center">{{__('messages.Conferma la nuova password')}}</h2>
                        <input type="password" name="password_confirmation" class="form-controll @error('password_confirmation') is-inavalid @enderror">
                        @error('password_confirmation')
                            <span class="text-danger small">{{$message}}</span>
                        @enderror
                        <label for="form-label">{{__('messages.Password da confermare')}}</label>
                    </div>

                    <div class="pt-1 mb-4">
                        <button class="btn btn-dark" type="submit">{{__('messages.Cambia password')}}</button>
                    </div>
                </form>
        </div>   
    </div>
</x-layout>