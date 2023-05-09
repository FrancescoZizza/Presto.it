<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $langs_en=['Sport', 'Music', 'Motors', 'Freetime', 'Books', 'Bikes', 'Movies', 'Clothing', 'Eletronics', 'House'];
        $i=0;
        foreach(Category::all() as $category){
            $category->lang_en = $langs_en[$i];
            $category->save();
            $i++;
        }

        $langs_pt=['Esporte','Mùsica','Motores','Tempo Livre','Livros','Bicicletas','Cinema','Vestuario','Eletrônica','Casa'];
        $i=0;
        foreach(Category::all() as $category){
            $category->lang_pt = $langs_pt[$i];
            $category->save();
            $i++;
        }

    }
}
