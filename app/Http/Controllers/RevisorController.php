<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;


class RevisorController extends Controller
{
    public function index(){
        // Se la colonna is_accepted ha valore null(ossia che deve essere confemrato), prendimi quell''annuncio
        $announcement_to_check=Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact ('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        // Se viene accettato, mi rindirizzi indietro alla pagina precedente con il messagio
        $announcement->setAccepted(true);
        return redirect()->back()->with('message',"Hai accettato l' annuncio!");
    }

    public function rejectAnnouncement(Announcement $announcement){
        // Se viene rifiutato idem riga 17
        $announcement->setAccepted(false);
        return redirect()->back()->with('message',"Hai rifiutato l' annuncio!");
    }

    public function becomeRevisor(Request $request){
        // l'utente vuole diventare revisore, pertanto arriva una mail al admin@presto.it con il messaggio che ha richiesto di idventare revisore, creiamo il becomeRevisor con il terminale
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $request));
        return redirect(route('announcemnets.index'))->with('message',"Hai richiesto di diventare revisore");
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect(route('announcemnets.index'))->with('message',"Complimenti l'utente è diventato revisore");
    }
}
