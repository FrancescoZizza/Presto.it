<div>
    <div class="container border-form my-3">
        <h4 class="text-center pt-4">{{__('messages.Crea il tuo annuncio')}}</h4>
        <hr class="linea-form">
        <form class="row row-form w-100" wire:submit.prevent="store">
        @csrf
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="form-label">{{__('messages.Titolo Annuncio')}}</label>
                    <input type="text" class="form-control" wire:model.debounce.lazy="title">
                    @error('title')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
                </div>
        
                <div class="mb-3">
                    <label class="form-label">{{__('messages.Descrizione annuncio')}}</label>
                    <textarea class="form-control mb-2"  cols="30" rows="10" wire:model.debounce.lazy="description"></textarea>
                    @error('description')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
                </div>   
            </div>

            <div class="col-12 col-md-6">
                    
                <div class="mb-3">
                    <label class="form-label">{{__('messages.Posizione')}}</label>
                    <input type="text" class="form-control" wire:model.debounce.lazy="position">
                    @error('position')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{__('messages.Inserisci le immagini dell annuncio')}}</label>
                    <input type="file" class="form-control @error('temporary_images.*') is-invalid @enderror" name="images" multiple wire:model="temporary_images">
                    @error('temporary_images.*')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">{{__('messages.Prezzo')}}</label>
                    <input type="number" class="form-control" wire:model.debounce.lazy="price">
                    @error('price')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{__('messages.Seleziona la categoria')}}: </label>
                    <select wire:model.debounce.lazy="category" id="category">
                        
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')<span class="error alert alert-danger p-1">{{$message}}</span> @enderror
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-cta">{{__('messages.Pubblica annuncio')}}</button>
                </div>

            </div>
            @if (!empty($images))
                <div class="row">
                    <div class="col">
                        <p>{{__('messages.Photo Preview')}}</p>
                        <div class="row border border-4 border-info">
                            @foreach($images as $key=>$image)
                                <div class="col">
                                    <div class="image-preview " style="background-image:url({{$image->temporaryUrl()}});"><button type="button" wire:click="removeImage({{$key}})" class="btn d-flex justify-content-end" ><i class="fa-solid fa-xmark text-danger fa-2x"></i></button></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                
            @endif
        
        </form>
    </div>

</div>

