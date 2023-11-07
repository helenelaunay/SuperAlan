<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Skill;

class HeroController extends Controller
{
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
        $skills = Skill::all();
        return view('hero.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'gender' => 'required',
            'race' => 'required',
            'description' => 'required',
            'skill_id' => 'required'
        ]);

        Hero::create([
            'name' => $request->name,
            'image' => $request->image,
            'gender' => $request->gender,
            'race' => $request->race,
            'description' => $request->description,
            'skill_id' => $request->input('skill_id')
        ]);

        return redirect()->route('welcome')->with('message', 'Héros créé avec succès !');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hero = Hero::find($id);
        $skills = Skill::all();
        return view('hero.edit', compact('hero'), compact('skills'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updateHero = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'gender' => 'required',
            'race' => 'required',
            'description' => 'required',
            'skill_id' => 'required'
        ]);
        $updateHero = Hero::find($id);

        $updateHero->update([
            'name' => $request->name,
            'image' => $request->image,
            'gender' => $request->gender,
            'race' => $request->race,
            'description' => $request->description,
            'skill_id' => $request->input('skill_id')
        ]);

        $updateHero->save();

        return redirect()->route('welcome')
                         ->with('success', 'Pouvoir mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hero = Hero::find($id);
        $hero->delete();
        return redirect('/')->with('success', 'Pouvoir supprimé avec succès');
    }
}
