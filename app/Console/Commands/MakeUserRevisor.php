<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //Utilizziamo l'email come parametro 
    protected $signature = 'presto:makeUserRevisor {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rendi un utente revisore';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();

    }

    public function handle()
    {
        //Dell'utente cerca l'argomento email e prendi il primo che trovi
        $user = User::where('email', $this->argument('email'))->first();
        if (!$user) {
            //se non trovi l'utente cercato restituisci il messaggio 'Utente..'
            $this->error('Utente non trovato');
            return;
        }
        
        //quando riconosci l'utente imposta il valore della colonna is_revisor su true, salvandolo
        $user->is_revisor = true;
        $user->save();

        $this->info("L'utente {$user->name} è ora un revisore");
    }
}