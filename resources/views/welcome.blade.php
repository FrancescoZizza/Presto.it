<x-layout>
     
  <div class="video-wrapper">
    <video src="/storage/video/header.mp4" muted loop autoplay></video>
  </div>
 
  <div class="card-container container-fluid px-auto">
    <div class="row mx-auto"> 

      <div class="col-12 d-flex justify-content-center mx-auto">
        <div class="card-grid">
          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '1'])}}">
            <div class="card__background " style="background-image: url({{Storage::url('img/sport.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.sport')}}</h3>
            </div>
          </a>

          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '2'])}}">
            <div class="card__background" style="background-image: url({{Storage::url('img/musica.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.musica')}}</h3>
            </div>
          </a>

          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '3'])}}">
            <div class="card__background" style="background-image: url({{Storage::url('img/motori.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.motori')}}</h3>
            </div>
          </a>

          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '4'])}}">
            <div class="card__background" style="background-image: url({{Storage::url('img/tempoLibero.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.tempolibero')}}</h3>
            </div>
          </a>

          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '5'])}}">
            <div class="card__background" style="background-image: url({{Storage::url('img/libri.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.libri')}}</h3>
            </div>
          </a>

          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '6'])}}">
            <div class="card__background " style="background-image:url({{Storage::url('img/bici.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.bici')}}</h3>
            </div>
          </a>


          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '7'])}}">
            <div class="card__background" style="background-image: url({{Storage::url('img/cinema.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.cinema')}}</h3>
            </div>
          </a>

          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '8'])}}">
            <div class="card__background" style="background-image: url({{Storage::url('img/abbigliamento.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.abbigliamento')}}</h3>
            </div>
          </a>

          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '9'])}}">
            <div class="card__background" style="background-image: url({{Storage::url('img/elettronica.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.elettronica')}}</h3>
            </div>
          </a>

          <a class="card1 height_card" href="{{route('categoryShow', ['category' => '10'])}}">
            <div class="card__background" style="background-image: url({{Storage::url('img/casa.png')}})"></div>
            <div class="card__content">
              <h3 class="card__heading">{{__('messages.casa')}}</h3>
            </div>
          </a>

        </div>
      </div>
    </div>
  </div>

  <div class="container my-5">
      <div class="row justify-content-center text-center">
        <h2>{{__('messages.ultimiannunci')}}</h2>

        
        @foreach ($announcements as $announcement)
        <div class="col-12 col-md-4 my-5 d-flex justify-content-center">
          <div class="card shadow-sm">
            <div class="card-image mx-auto">
              <img 
            src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : Storage::url("img/default.png")}}"/>
            </div>
            
            <div class="card-heading">
              {{substr($announcement->title, 0, 30)}}...
            </div>
            <div class="card-text">
              {{substr($announcement->description,0,50)}}...
            </div>
            <div class="card-text">
              €{{$announcement->price}}
              <div>
                <small class="text-muted">{{__('messages.Pubblicato il')}} {{$announcement->created_at}}</small>
                
              </div><a href="{{route('categoryShow', [ 'category' => $announcement->category ])}}"> {{__('messages.categoria')}} {{$announcement->category->name}}</a> 
            </div>
            <div class="card-body d-flex justify-content-center">
              <a href="{{route('announcemnets.show', compact('announcement'))}}" class="card-button">{{__('messages.dettaglio')}}</a>
            </div>
          </div>
        </div>
              @endforeach
      </div>
  </div>

  <div class="container container-team">

    <div class="row w-100 justify-content-center border-custom mb-5">

      <h3 class="text-center border-custom py-3">Il Nostro Team</h3>

      <div class="col-6 col-md-4 text-center my-3">

        <div class="position-relative overflow-hidden">

          <img class="img-team shape" src="{{Storage::url('img/sebateam.jpg')}}" alt="">
        

        </div>
        <h5>Sebastiano Mininni</h5>
        <i>Scrum Master</i>


      </div>
    
      <div class="col-6 col-md-4 text-center my-3">
        <div class="position-relative overflow-hidden">
          <img class="img-team shape" src="{{Storage::url('img/zizzateam.png')}}" alt="">
          <h5>Francesco Zizza</h5>
          <i>Junior Web Developer</i>
        </div>
      </div>
    
    
        <div class="col-6 col-md-4 text-center my-3">
          <div class="position-relative overflow-hidden shape">
            <img class="img-team shape" src="{{Storage::url('img/aleteam.jpg')}}" alt="">
          </div>
          <h5>Alessandro Bottalico</h5>
            <i>Junior Web Developer</i>

        </div>


  

  

      <div class="col-6 col-md-4 text-center my-3">
        <div class="position-relative overflow-hidden shape">
          <img class="img-team shape" src="{{Storage::url('img/silviateam.jpg')}}" alt="">
        
        </div>
        <h5>Silvia Anaclerio</h5>
        <i>Junior Web Developer</i>

      </div>

      <div class="col-6 col-md-4 text-center my-3">
        <div class="position-relative overflow-hidden shape">
          <img class="img-team shape" src="{{Storage::url('img/frateam.jpg')}}" alt="">
        
        </div>
        <h5>Francesco Greco</h5>
        <i>Junior Web Developer</i>
      </div>

      <div class="col-6 col-md-4 text-center my-3">
        <div class="position-relative overflow-hidden shape">
          <img class="img-team shape" src="{{Storage::url('img/default.png')}}" alt="">
        
        </div>
        <h5>Marta Mischiatti</h5>
        <i>Junior Web Developer</i>
      </div>

    </div>

  </div>
  
</x-layout>
