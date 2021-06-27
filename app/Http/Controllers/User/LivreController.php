<?php

namespace App\Http\Controllers\User;

use App\Models\Livre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livres = Livre::latest()->get();
        return view('user.livres.index',compact('livres'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livres = Livre::all();
        return view('user.livres.create',compact('livres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
    $validator = Validator::make($request->all(),
        [
            "title" => ["required", "string", "max:255"],
            "name" => ["required", "string","max:255" ],
            "content" => ["required", "string"],
            "note" => ["required","integer"],
        ],
        [
            "title.required" => "le titre est obligatoire",
            "title.string" => "Veuillez entrer une chaine de caractéres .",
            "title.max" => "Veuillez entrer 255 caracteres au maximum",

            
            "name.required" => "Le nom est obligatoire",
            "name.string" => "Veuillez entrer une chaine de caractéres .",
            "name.max" => "Veuillez entrer 255 caracteres au maximum",

            "content.required" => "L'avis est obligatoire",
            "content.string" => "Veuillez entrer une chaine de caractéres .",

            "note.required" => "la note est obligatoire",
            "note.integer" => "Ceci doit etre un entier",
        ]);
        
        if($validator->fails())


        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        Livre::create([
            "title" =>$request->title,
            "name" =>$request->name,
            "content" =>$request->content,
            "note" =>$request->note,
        ]);
        return redirect()->route("user.livres.index")->with([
            "success" =>"votre livre vient d'etre sauvgardé"
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $livre = Livre::where("id",$id)->first();


        if (!$livre)
        {
            return redirect()->route('user.livres.index')->with([
                "warning"=>"Cette catégorie n'existe pas",
            ]);

        }
        else
        {

        return view("user.livres.edit", compact('livre'));  
      
        }
        
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $livre = Livre::find($id);
        $validator = Validator::make($request->all(),
            [
                "title" => ["required", "string", "max:255"],
                "name" => ["required", "string","max:255" ],
                "content" => ["required", "string"],
                "note" => ["required","integer"],
            ],
            [
                "title.required" => "le titre est obligatoire",
                "title.string" => "Veuillez entrer une chaine de caractéres .",
                "title.max" => "Veuillez entrer 255 caracteres au maximum",
    
                
                "name.required" => "Le nom est obligatoire",
                "name.string" => "Veuillez entrer une chaine de caractéres .",
                "name.max" => "Veuillez entrer 255 caracteres au maximum",
    
                "content.required" => "L'avis est obligatoire",
                "content.string" => "Veuillez entrer une chaine de caractéres .",
    
                "note.required" => "la note est obligatoire",
                "note.integer" => "Ceci doit etre un entier",
            ]);
            
            if($validator->fails())
    
    
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $livre->slug = null;
            $livre->update([
                "title" =>$request->title,
                "name" =>$request->name,
                "content" =>$request->content,
                "note" =>$request->note,
            ]);
            return redirect()->route("user.livres.index")->with([
                "success" =>"votre livre a été bien modifier."
            ]);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {      
    $livre = Livre::find($id);
        
        $livre->delete();
       
        return redirect()->route("user.livres.index")->with([
            "success"=>"Votre livre du nom de : " . $livre->name . " a été supprimée avec succès."
        ]);
    }
}