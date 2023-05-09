<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct(){
        // $this->middleware('verified');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
    // Questa funzione utilizza la d.i., ritornando alla vista show(presente nella cartella announcement), con la compact di announcement
    public function showAnnuncement(Announcement $announcement){
        return view('announcement.show', compact('announcement'));
    }
    // Questa funzione richiama la variabile annunci, in cui viene richiesyo il modello e il metodo paginate(), serve per impostare il numero di annunci presenti in una pagina, in questo caso (8)
    public function indexAnnuncement(){
        $announcements = Announcement::Where('is_accepted', true)->latest()->paginate(6);
        return view('announcement.index', compact('announcements'));
    }
}
