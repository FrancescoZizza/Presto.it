<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected  $fillable = ['name', 'lang_en','lang_pt'];

    public function announcements(){
        //funzione di relazione dove il hasMany relazione N annunci a 1 annunci
        return $this->hasMany(Announcement::class);
    }
}
