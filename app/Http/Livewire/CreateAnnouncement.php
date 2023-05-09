<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $position;
    public $price;
    public $category;
    public $images=[];
    public $temporary_images;
    public $announcement;
    
    protected $rules = [
        'title'=>'required|min:2|max:50',
        'description'=>'required|min:2|max:500',
        'position'=>'required|min:2|max:50',
        'price'=>'required|numeric',
        'category'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
    ];
    
    protected $messages = [
        'required'=>'il campo :attribute è obbligatorio',
        'min'=>'il campo :attribute deve essere di minimo :min caratteri',
        'numeric'=>'il campo :attribute deve essere un numero',
        'description.max'=>'il campo description deve essere di massimo 500 caratteri',
        'max'=>'il campo :attribute deve essere di massimo :max caratteri',
        'images.image'=>"Il file deve essere un'immagine",
        'images.max'=>"L'immagine deve essere massimo 1Mb",
        'temporary_images.*.image'=>"Il file deve essere un'immagine",
        'temporary_images.*.max'=>"L'immagine deve essere massimo 1Mb",
    ];
    

    public function updated($annuncio){
        $this->validateOnly($annuncio);
    }

    public function store()
    {
        $this->validate();
        //Richiamiamo la variabile category che sarà uguale=Alla ricerca della categoria, di un determinato id e restituisce la prima corrispondenza trovata
        // $category = Category::where('id', $this->category)->first();
        // $announcement = $category->announcements()->create([
         
        //     'title'=>$this->title,
        //     'description'=>$this->description,
        //     'position'=>$this->position,
        //     'price'=>$this->price
        
            
        // ]);

        $this->announcement = Category::find($this->category)-> announcements()->create ($this->validate());

        if(count($this->images)){
            foreach($this->images as $image) {
                // $announcement->images()->create(['path'=>$image->store('img', 'public')]);

                // creiamo la cartella nell'announcement,con l'immagine presente come crop e originale, divisi per id
            
               $newFileName="announcements/{$this->announcement->id}";
                // abbiamo commentato la riga sotto il foreach, perchè qui salveremo l'immagine
                $newImage=$this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);
                RemoveFaces::withChain([

                    new ResizeImage($newImage->path,400,300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
                
                

            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        //In questo codice stiamo salvando un nuovo oggetto $announcement nel database associato all'utente autenticato (Auth::user()) attraverso la relazione "announcements()" definita nel modello dell'utente.
        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save(); 
        $this->reset();
        //dd($this->temporary_images);
        return redirect()->route('annuncio.create')->with('message','Il tuo annuncio è stato creato ed è in attesa di revisione');
    }

  

    public function updatedTemporaryImages()
    {
        if ($this->validate(['temporary_images.*'=> 'image|max:1024'])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        // Se nell'array $images esiste il parametro $key rimuovila dall'array
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    } 
    
    public function render()
    {
        return view('livewire.create-announcement');
    }
}
