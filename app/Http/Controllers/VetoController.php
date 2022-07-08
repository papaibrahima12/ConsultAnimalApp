<?php

namespace App\Http\Controllers;

use App\Models\Veto;
use Illuminate\Http\Request;

class VetoController extends Controller
{

    public function index()
    {
        return view('veto.list');
    }

    public function showAll()
    {
        $vetos = Veto::all();
        return view('veto.list',['vetos'=>$vetos]);
    }

    public function add()
    {
        return view('veto.add');
    }

    public function store(Request $request)
    {
        if($request->method() == "POST") {
            $veto = new Veto();
            $veto->nom = $request->nom;
            $veto->prenom = $request->prenom;
            $veto->email = $request->email;
            $veto->adresse = $request->adresse;
            $veto->telephone = $request->telephone;
            $result = $veto->save();

            return $this->showAll();
        }else{
            return $this->add();
        }
    }

    public function show($id)
    {
        $veto = Veto::find($id);
        return view('veto.edit', ['veto' => $veto]);
    }

    public function update(Request $request, Veto $veto)
    {
        if($request->method() == "POST") {
            $veto = Veto::find($request->id);
            $veto->nom = $request->nom;
            $veto->prenom = $request->prenom;
            $veto->adresse = $request->adresse;
            $veto->telephone = $request->telephone;
            $result = $veto->save();

            return $this->showAll();
        }else{
            return $this->add();
        }
    }

    public function delete($id)
    {
        $veto = Veto::find($id);
        if($veto != null) {
            $veto->delete();
        }
        return $this->showAll();
    }
}
