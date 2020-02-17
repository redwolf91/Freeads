<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = DB::table('annonces')->get();
        return view('annonces.index', compact('annonces'))
                                    ->with((request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $annonce = Annonce::create([
            'user_id' => Auth::id(),
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix
        ]);
        
        $name = time().'.'.$request->photo->extension();
            Photo::create([
                'name' => $name,
                'annonce_id' => $annonce->id
            ]);
            $request->photo->move(public_path('photos'), $name);
        
        return redirect()->route('annonces.index')
                            ->with('success', 'Annonce created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        
        $photos = DB::table('photos')->where('annonce_id', $annonce->id)->get();
        
        return view('annonces.show',compact('annonce', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        if($annonce->user_id != Auth::id())
        {
            return redirect()->route('annonces.index')
                            ->with('success', "vous n'avez pas les droit pour editez cette annonce");
    
        }
        else
        {
            return view('annonces.edit',compact('annonce'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
        ]);
        $annonce->update($request->all());
        
        return redirect()->route('annonces.index')
                            ->with('success', 'Annonce update successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        if($annonce->user_id != Auth::id())
        {
            return redirect()->route('annonces.index')
                            ->with('success', "vous n'avez pas les droit pour suprimer cette annonce");
    
        }
        else
        {
            $annonce->delete();

        return redirect()->route('annonces.index')
                            ->with('success', 'Annonce delete successfully.');
        }
        
    }
}
