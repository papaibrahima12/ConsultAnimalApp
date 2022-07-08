<?php

namespace App\Http\Controllers;

use App\Models\Veto;
use App\Models\Animal;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        return view('consultation.list');
    }

    public function showAll()
    {
        $consultations = Consultation::all();
        return view('consultation.list', ['consultations'=>$consultations]);
    }

    public function add()
    {
        $animaux = Animal::all();
        $vetos = Veto::all();
        return view('consultation.add', ['animaux'=>$animaux, 'vetos'=>$vetos]);
    }

    public function store(Request $request)
    {
        if($request->method() == "POST")
        {
            $consultation = new Consultation();
            $consultation->animals_id = $request->animal;
            $consultation->vetos_id = $request->veto;
            $consultation->users_id = Auth::id();
            $consultation->libelle = $request->libelle;
            $consultation->constat = $request->constat;

            $consultation->save();
        }
        return $this->showAll();
    }

    public function show($id)
    {
        $animaux = Animal::all();
        $vetos = Veto::all();
        $consultation = Consultation::find($id);
        return view('consultation.edit', ['consultation' => $consultation, 'animaux'=>$animaux, 'vetos'=>$vetos]);
    }

    public function update(Request $request, Consultation $consultation)
    {
        if($request->method() == "POST")
        {
            $consultation = Consultation::find($request->id);
            $consultation->animals_id = $request->animal;
            $consultation->vetos_id = $request->veto;
            $consultation->users_id = Auth::id();
            $consultation->libelle = $request->libelle;
            $consultation->constat = $request->constat;

            $consultation->save();
        }
        return redirect('consultation/showAll');
    }

    public function delete($id)
    {
        $consultation = Consultation::find($id);
        if($consultation != null)
        {
            $consultation->delete();
        }
        return redirect('consultation/showAll');
    }
}
