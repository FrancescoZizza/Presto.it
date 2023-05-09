<?php

namespace App\Jobs;



use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    // h sta per altezza dell'immagine
    private $h;
    // w sta per larghezza dell'immagine
    private $w;
    // fileName è il nome del file
    private $fileName;
    // Path è il percoso del file
    private $path;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath, $w,$h)
    {
        // Prende il nome della directory della filePath, per gli amici come noi a cartella
        $this->path=dirname($filePath);
        // Prende il nome del file, in questo caso è l'immagine che ci arriverà
        $this->fileName=basename($filePath);
        $this->w=$w;
        $this->h=$h;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w=$this->w;
        $h=$this->h;
        // La variabile scrpath sarà uguale, al strorage_path come funzione, presente nella cartella app e public dove prenderà il path dal filename
        $scrPath=storage_path() . '/app/public/'. $this->path. '/' . $this->fileName;
        // Sposta l'immagine originale e la rinonima, con le dimensioni che noi vogliamo utulizzare, il termine tecnico si chiama CROP
        $destPath=storage_path() . '/app/public/'. $this->path. "/crop_{$w}X{$h}_" . $this->fileName;
            
        // Dell'immapgine croppata, sarà uguale al modello image, richhiamta la funzione load(ossia di caricamento), accetta il parametro del src path, nel crop facciao la manipolazione dell'altezza e larghezza e lo salviamo
        $croppedImage= Image::load($scrPath)
                        ->crop(Manipulations::CROP_CENTER, $w, $h)
                        ->watermark(storage_path('app/public/img/watermark.png'))
                        ->watermarkOpacity(90)
                        ->watermarkPosition(Manipulations::POSITION_CENTER)
                        ->watermarkHeight(25, Manipulations::UNIT_PERCENT) 
                        ->save($destPath);
        
    
    }
}
