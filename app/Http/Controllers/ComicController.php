<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComicRequest $request)
    {

        /*$request->validate([
            'title' => 'required|max:100|min:2',
            'description' => 'max:255',
            'thumb' => 'max:255|min:0',
            'price' => 'required|max:6|min:1',
            'series' => 'max:255',
            'sale_date' => 'required|max:10|min:1',
            'type' => 'max:30|min:0',
        ],*/
        /*[
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.max' => 'Il titolo deve avere al massimo :max caratteri',
            'title.min' => 'Il titolo deve avere al minimo :min caratteri',
            'description.max' => 'Il titolo deve avere al massimo :max caratteri',
            'thumb.max' => 'La URL \'immagine  deve avere al massimo :max caratteri',
            'thumb.min' => 'La URL \'immagine deve avere al minimo :min caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'price.max' => 'Il prezzo deve avere al massimo :max caratteri',
            'price.min' => 'Il prezzo deve avere al minimo :min caratteri',
            'series.max' => 'Series deve avere al massimo :max caratteri',
            'sale_date.required' => 'La data di vendita è un campo obbligatorio',
            'sale_date.max' => 'La data di vendita deve avere al massimo :max caratteri',
            'sale_date.min' => 'La data di vendita deve avere al minimo :min caratteri',
            'type.required' => 'Il tipo è un campo obbligatorio',
            'type.max' => 'Il tipo deve avere al massimo :max caratteri',
            'type.min' => 'Il titolo deve avere al minimo :min caratteri',
        ])*/;

        $form_data = $request->all();

        $new_comic = new Comic();
   /*      $new_comic->title = $form_data['title'];
        $new_comic->slug = Comic::generateSlug($new_comic->title);
        $new_comic->description = $form_data['description'];
        $new_comic->thumb = $form_data['thumb'];
        $new_comic->price = $form_data['price'];
        $new_comic->series = $form_data['series'];
        $new_comic->sale_date = $form_data['sale_date'];
        $new_comic->type = $form_data['type']; */
        $form_data['slug'] = Comic::generateSlug($form_data['title']);
        $new_comic->fill($form_data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        //dd($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(ComicRequest $request, Comic $comic)
    {
       $form_data = $request->all();
       //dump($comic);
       //dd($form_data);

       //si genera un nuovo slug solo se il titolo è stato modificato, altrimenti non serve
       if($form_data['title'] != $comic->title){
            $form_data['slug'] = Comic::generateSlug($form_data['title']);
       }else{
        $form_data['slug'] = $comic->slug;
       }

       $comic->update($form_data);

       return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        //reindirizzamento alla index comunicando in sessione la corretta eliminazione
        //metodo with, con primo paramentro variabile di sessione e secondo parametro messaggio da passare
        return redirect()->route('comics.index')->with('deleted', "Comic $comic->title has been correctly deleted");
    }
}
