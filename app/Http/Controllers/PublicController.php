<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{


    public function home(){
        // Il metodo "latest()" viene utilizzato per ordinare gli annunci in ordine decrescente per ID, in modo che gli annunci più recenti siano restituiti per primi. Il metodo "take(6)" viene utilizzato per limitare il numero di annunci restituiti a 6. Infine, il metodo "get()" viene utilizzato per effettuare la query al database e restituire un insieme di risultati contenenti i 6 annunci più recenti.
        // Se il reevisore accetta l'annuncio, prendimi i primi sei accettati
        $announcements = Announcement::Where('is_accepted', true)->latest()->take(6)->get();

        return view('welcome', compact('announcements'));

    }
    // Questa funzione utilizziamo la d.i, con una vista category show,(fuori da tutte le cartelle), quindi presente nella cartella view, con la compact di category
    public function categoryShow(Category $category){

        return view('categoryShow', compact('category'));
    }
  //eseguiamo una d.i, accetta come parametro request, pssoa una richiesta
    public function searchAnnouncements(Request $request)
    {
    //viene utilizziata la classe announcement che rappresenta gli annunci memorizzati, e per eseguire una ricerca usiamo il metodo search definita dalla claasse announcement, lavora in base alla stringa di ricerca fornita,dopo averla eseguita include gli annunci che sono stati accetatti, dal revisore e viene utilizzato il metodo paginate per indicare che i risulatati vengono suddivisi in blocchi da 10 annunci per pagina
        $announcements = Announcement::search($request->searched)-> where('is_accepted', true)->paginate(10);
    //ritorna alla vista che mosta gli annunci trovati, grazie anche alla compact.
        return view('announcement.index', compact('announcements'));
    }

    public function userUpdate(){

        return view('user.updateUser');
    }
    public function contact(){
        return view('contact');
    }
    //funzione per traduz lingue
    public function setLocale($lang){
        // dd($lang);
        session()->put('locale',$lang);
        return redirect()->back();
    }
}
