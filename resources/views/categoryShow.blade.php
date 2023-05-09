<x-layout>

  <div class="container-fluid">
      <div class="row justify-content-center text-center">
          {{-- Il codice @if controlla se la collezione di annunci associata alla variabile $category è vuota usando il metodo isEmpty().
            Se la collezione di annunci è vuota, il codice all'interno del blocco @if viene eseguito, altrimenti viene ignorato e il controllo passa al blocco successivo, se presente. ok --}}
          @if($category->announcements->isEmpty())
              <div class="col-12 my-5">
                  <p class="h1">{{__('messages.Non sono presenti annunci per questa categoria')}}</p>
                  <p class="h2"><a href="{{route('annuncio.create')}}" class="btn btn-cta">{{__('messages.Nuovo annuncio')}}</a></p>
              </div>
              @else
              <div class="col-6 d-flex justify-content-center text-end my-auto">
                <p class="h2 ">{{$category->name}}</p>
              </div>
              <div class="col-12 col-md-6 d-flex justify-content-center my-auto">
                <a href="{{route('annuncio.create')}}" class="btn btn-cta">{{__('messages.Nuovo annuncio')}}</a>
              </div>
              @foreach ($category->announcements as $announcement)
              <div class="col-12 col-md-4 my-5 d-flex justify-content-center">
                <div class="shadow-sm">
                  <div class="card-image mx-auto">
                    <img 
                    src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : Storage::url("img/default.png")}}"/>
                  </div>
                  
                  <div class="card-heading">
                    {{substr($announcement->title, 0, 30)}}...
                  </div>
                  <div class="card-text">
                    {{substr($announcement->description,0,100)}}...
                  </div>
                  <div class="card-text">
                    €{{$announcement->price}}
                    <div>
                      <small class="text-muted">{{__('messages.Pubblicato il')}}: {{$announcement->created_at}}</small>
                      
                    </div><p href="#" >{{__('messages.categoria')}}: {{$announcement->category->name}}</p> 
                  </div>
                  <a href="{{route('announcemnets.show', compact('announcement'))}}" class="card-button">{{__('messages.Scopri di più')}}</a>
                </div>
              </div>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>
