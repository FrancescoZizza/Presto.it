<x-layout>
  <x-header
      title="{{__('messages.Pagina del revisore')}}"
  />
  <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
              <h1 class="my-5 text-center">{{$announcement_to_check ? "Ecco l'annuncio da revisionare" : "Non ci sono annunci da revisionare"}}</h1>
          </div>
      </div>
  </div>

  @if($announcement_to_check)
<div class="container">
      <div class="row justify-content-start">
        @if ($announcement_to_check->images->isNotEmpty())
        @foreach ($announcement_to_check->images as $image)
        <div class="col-12 col-md-6 ">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row">
                  {{-- Immagine --}}
                  <div class="col-md-12 text-center">
                    <img src="{{$image->getUrl(400,300)}}" class="img-fluid p-3 rounded" alt="">
                  </div>
                  {{-- Revisone --}}
                  <div class="col-12 col-md-6">
                    <div class="card-body">
                      <h5>Revisione immagine</h5>
                      <p>Adulti: <span class="{{$image->adult}}"></span></p>
                      <p>Satira: <span class="{{$image->spoof}}"></span></p>
                      <p>Medicina: <span class="{{$image->medical}}"></span></p>
                      <p>Violenza:  <span class="{{$image->violence}}"></span></p>
                      <p>Contenuto ammiccante:  <span class="{{$image->racy}}"></span></p>
                    </div>

                    <div class="card-body d-flex d-lg-none">
                      <h5>Tags</h5>
                      <div class="p-2 mt-4">
                        @if($image->labels)
                          @foreach($image->labels as $label)
                            <p class="d-inline">{{$label}}</p>
                          @endforeach
                        @endif
                      </div>
                    </div>

                  </div>
                  {{-- Tag --}}
                  <div class="col-md-6 d-none d-lg-flex">
                    <div class="card-body">
                      <h5>Tags</h5>
                        <div class="p-2 mt-4">
                          @if($image->labels)
                            @foreach($image->labels as $label)
                              <p class="d-inline">{{$label}}</p>
                            @endforeach
                          @endif
                        </div>
                    </div>
                  </div>
                </div>

              </div>
        </div>
        @endforeach
          <div class="col-md-12 mt-3">
            <div class="card-body card">
              <h5 class="card-title text-center">{{__('messages.Titolo')}}: {{$announcement_to_check->title}}</h5>
              <p class="card-footer mt-3 text-center">{{__('messages.Descrizione')}}: {{$announcement_to_check->description}}</p>
              <p class="card-footer text-center">{{__('messages.Prezzo')}}: {{$announcement_to_check->price}} euro</p>
              <p class="card-footer text-center">{{__('messages.Venduto in')}} {{$announcement_to_check->position}}</p>
              <p class="card-footer text-center">{{__('messages.Pubblicato il')}}{{$announcement_to_check->created_at}}</p>
            </div>
          </div>
          @else
          <div class="">
            <img src="{{Storage::url("img/default.png")}}" class="d-block mx-auto w-80 h-80" alt="...">
          </div>
          <div class="col-md-12 mt-3">
            <div class="card-body card">
              <h5 class="card-title text-center">{{__('messages.Titolo')}}: {{$announcement_to_check->title}}</h5>
              <p class="card-footer mt-3 text-center">{{__('messages.Descrizione')}}: {{$announcement_to_check->description}}</p>
              <p class="card-footer text-center">{{__('messages.Prezzo')}}: {{$announcement_to_check->price}} euro</p>
              <p class="card-footer text-center">{{__('messages.Venduto in')}} {{$announcement_to_check->position}}</p>
              <p class="card-footer text-center">{{__('messages.Pubblicato il')}}{{$announcement_to_check->created_at}}</p>
            </div>
          </div>
          @endif    
    </div>
      <div class="row">
        <div class="col-12 justify-content-between d-flex">
          <form action="{{route('revisor.accept_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
          @csrf 
          @method('PATCH')
          <button class="btn shadow btn-success my-5" type="submit">{{__('messages.Accetta')}}</button>
        </form>
        <form action="{{route('revisor.reject_announcement',['announcement'=>$announcement_to_check])}}" method="POST">
            @csrf 
            @method('PATCH')
            <button class="btn shadow btn-danger my-5" type="submit">{{__('messages.Rifiuta')}}</button>
          </form>
        </div> 
      </div>
</div>
          @endif

</x-layout>