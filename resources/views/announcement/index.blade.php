<x-layout>
  
  
  <x-header
  title="{{__('messages.allAnnouncement')}}"
  />
  @if (session()->has('message'))
  <div class="alert alert-success" role="alert">  
    {{session('message')}}
  </div>
  @endif
  <div class="container-fluid">
    <div class="row justify-content-center">
      @if($announcements->isEmpty())
      <h2 class="text-center mt-5">{{__('messages.Non ci sono annunci con questo titolo')}}</h2>
      @else 
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form action="{{route('announcements.search')}}" method="GET" class="d-flex mx-3 my-3" role="search">
            <input name="searched" class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div> 
      </div>
      
      @foreach ($announcements as $announcement)
      <div class="col-md-5 my-5 d-flex justify-content-center">
        <div class="card shadow-sm">
          <div class="card-image">
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
              <small class="text-muted">{{__('messages.Pubblicato il')}}: {{$announcement->created_at}}</small>
            </div>
            <a href="{{route('categoryShow', [ 'category' => $announcement->category ])}}" class="mt-3">{{__('messages.categoria')}}: {{$announcement->category->name}}</a> 
          </div>
          <div class="card-body d-flex justify-content-center">
            <a href="{{route('announcemnets.show', compact('announcement'))}}" class="card-button">{{__('messages.Scopri di più')}}</a>
          </div>
        </div>
      </div>
      
      @endforeach
      @endif
    </div>
  </div>
  
  {{$announcements->links()}}
</x-layout>

