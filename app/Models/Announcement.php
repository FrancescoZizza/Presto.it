<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{

    use HasFactory, Searchable;
    protected $fillable=['title', 'description', 'price','position',];

    // @return array

    public function toSearchableArray()
    {
        // la variabile $category viene assegnata al valore della proprietà category dell'oggetto, il che suggerisce che l'oggetto stesso potrebbe avere una proprietà category che viene utilizzata per classificare l'oggetto in una categoria specifica.
        $category = $this -> category;
        $array = [
            //Array di tipo chiave valore, dove la chiave è 'id' il valore attribuito dall'oggetto(this) e il valore che viene preso
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $category,
        ];
        // Questo array viene quindi restituito dalla funzione con la riga di codice return $array;, in modo che possa essere utilizzato altrove nel programma.
        return $array; 
    }
    
    public function category(){
        //funzione di relazione dove il belongsTo relazione 1 categoria a N annunci
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted',null)->count(); //ritorna il num di annunci che nella colonna is_accepted hanno valore null
    }

    public function setAccepted($value){
        $this->is_accepted=$value;
        $this->save();
        return true;
    }

    public function images() {
        return $this->hasMany(Image::class);
    }


    
}
