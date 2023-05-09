<x-layout>
    <x-header 
        title="{{__('messages.Come recuperare la password?')}}"
    />
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if(session('status'))
                <div class="alert alert-success">
                    <p>{{session('status')}}</p>
                </div>
            @endif
            <form method="POST" action="/forgot-password">
                @csrf
                <div class="form-outline mb-4">
                    <input type="email" placeholder="Inserisci la tua email" name="email" class="form-controll @error('email') is-inavalid @enderror">
                    @error('email')
                        <span class="text-danger small">{{$message}}</span>
                    @enderror
                </div>
                <div class="pt-1 mb-4">
                    <button class="btn btn-dark" type="submit">{{__('messages.Ottieni una nuova password')}}</button>
                </div>
            </form>
        </div>   
        </div>
</div>
</x-layout>