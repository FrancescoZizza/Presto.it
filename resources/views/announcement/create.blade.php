<x-layout>
    {{-- <x-header
        title="Crea Il tuo Annuncio"
    /> --}}
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">  
      {{session('message')}}
    </div>
    @endif
    {{-- <div class="container-fluid my-3">
        <div class="row justify-content-center wh-100">
            <div class="col-6"> --}}
                <livewire:create-announcement />
            {{-- </div>
        </div>
    </div> --}}
    
</x-layout>