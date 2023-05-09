<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Expr\New_;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   // se abbiamo questa questa tabella sfruttiamo la classe View di laravel utilizzando il metodo share() per dire condividi con tutte le viste una variabile categories che conterra come valore tutte le categorie prese dal nostro DB
        
        if(Schema::hasTable('categories')){
            View::share('categories', Category::all());
        }
        // questa funziona serve per assicurerare che la paginazione generata sia stilisticamente coerente con il resto del sito web 
        Paginator::useBootstrap();
    }


}
