<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>{{__('messages.Un utente ha richiesto di lavorare con noi')}}</h2>
                <h4>{{__('messages.Ecco i suoi dati')}}:</h4>
                <p>{{__('messages.Nome')}}:{{$user->name}}</p>
                <p>Email:{{$user->email}}</p>
                <p>{{__('messages.Descrizione')}}:{{$request->description}}</p>
                <a href="{{route('make.revisor' , compact('user'))}}">{{__('messages.Rendi revisore')}}</a>
            </div>
        </div>
    </div>
    
</body>
</html>

