<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Skill::create([
            'name' => $request->name,
        ]);

        return redirect()->route('welcome');
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
    public function edit ($id)
    {
        $skill = Skill::findOrFail($id);
        return view('skill.edit', compact('skill'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $updateSkill = $request->validate([
            'name' => 'required'
        ]);

        $updateSkill = Skill::find($id);

        $updateSkill->update([
            'name' => $request->name
        ]);
        $updateSkill->save();

       // Skill::whereId($id)->update($updateSkill);
            return redirect()->route('welcome')
                             ->with('success', 'Pouvoir mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect('/')->with('success', 'Pouvoir supprimé avec succès');
    }
}
