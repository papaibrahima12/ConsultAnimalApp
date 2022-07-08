<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        return view('animal.list');
    }

    public function showAll(){
        $animaux = Animal::all();
        return view('animal.list', ['animaux' => $animaux]);
    }

    public function add()
    {
        return view('animal.add');
    }
    
    public function store(Request $request)
    {
        if($request->method() == "POST") {
            $animal = new Animal();
            $animal->nom = $request->nom;
            $animal->categorie = $request->categorie;
            $animal->age = $request->age;
            $animal->race = $request->race;
            $result = $animal->save();

            return $this->showAll();
        }else{
            return $this->add();
        }
    }

    public function show( $id)
    {
        $animal = Animal::find($id);
        return view('animal.edit', ['animal' => $animal]);
    }
    public function update(Request $request, Animal $animal)
    {
        if($request->method() == "POST") {
            $animal = Animal::find($request->id);
            $animal->nom = $request->nom;
            $animal->categorie = $request->categorie;
            $animal->age = $request->age;
            $animal->race = $request->race;
            $result = $animal->save();

            return $this->showAll();
        }else{
            return $this->add();
        }
    }

    public function delete($id)
    {
        $animal = Animal::find($id);
        if($animal != null) {
            $animal->delete();
        }
        return $this->showAll();
    }
}
