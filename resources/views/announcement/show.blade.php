<x-layout>
  
  
  <x-header
  title="{{$announcement->title}}"
  />
  
  
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-12 col-md-6">
              <div id="showCarousel" class="carousel slide dettaglioimg mx-auto" data-bs-ride="carousel">
                @if ($announcement->images->isNotEmpty())
                  <div class="carousel-inner">
                    @foreach ($announcement->images as $image)
                     <div class="carousel-item @if ($loop->first)active @endif">
                        <img src="{{Storage::url($image->path)}}" class="img-fluid p-3 rounded dettaglioimg" alt="">
                      </div>
                   @endforeach
                </div>
                  @else
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{Storage::url("img/default.png")}}" class="d-block w-100 h-50" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{Storage::url("img/default.png")}}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="{{Storage::url("img/default.png")}}" class="d-block w-100" alt="...">
                      </div>
                    </div>
                  @endif  
                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>  
              </div>
                <div class="col-12 col-md-6 my-auto me-auto">
                  <h5 class="card-title ">{{__('messages.Titolo')}}: {{$announcement->title}}</h5>
                  <p class="my-4 ">{{__('messages.Descrizione')}}: {{$announcement->description}}</p>
                  <p class="my-4 ">{{__('messages.Prezzo')}}: {{$announcement->price}} euro</p>
                  <p class="my-4 ">{{__('messages.Venduto in')}}: {{$announcement->position}}</p>
                  <p class="card-footer ">{{__('messages.Pubblicato il')}} {{$announcement->created_at}}</p>
                </div>
             
       </div>
    </div>    
  
  
</x-layout>