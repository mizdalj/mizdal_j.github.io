<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collab;
use App\Models\Enterprise;
use App\Providers\AuthServiceProvider;

class CollaborateurController extends Controller
{
    function addData(Request $request)
    {
        if (! $this->authorize('acces-gestionnaire')) { //verif acces admin
            abort(403);
        }
        $data = $request->validate([
            'civilite'=> 'required|string|max:15',
            'nom'=> 'required|string|max:25',
            'prenom'=> 'required|string|max:40',
            'adresse'=> 'required|string|max:100',
            'codePostal'=> 'required|numeric|digits:5',
            'ville'=> 'required|string|max:30',
            'numeroDeTelephone'=> 'required|unique:collabs,numeroDeTelephone|numeric|digits:10',
            'email'=> 'required|unique:collabs,email|email',
            'enterprise_id'=> 'required|string|max:10'
        ]);
        Collab::create($data);
        return redirect()->route('collaborateur');

    }

    function showAdd() {
        if (! $this->authorize('acces-gestionnaire')) { //verif acces admin
            abort(403);
        }
        $enterprises = Enterprise::all();
        return view('addcollab', ['enterprises'=>$enterprises]);
    }

    function showAllData()
    {
        $data = Collab::paginate(15);
        return view('listecollab', ['collabs'=> $data]);
    }
    function searchData(Request $request)
    {
        $search = $request->recherche;
        $enterprises = Enterprise::where('nom','LIKE', '%'.$search.'%')->get()->all();
        $ids = [];
        foreach ($enterprises as $enterprise){
            array_push($ids, $enterprise->id);
        }
        $data = Collab::where('nom','LIKE', '%'.$search.'%')
                        ->orWhere('prenom','LIKE', '%'.$search.'%')
                        ->orWhere('numeroDeTelephone','LIKE', '%'.$search.'%')
                        ->orWhere('email','LIKE', '%'.$search.'%')
                        ->orWhereIn('enterprise_id', $ids)
                        ->paginate(15);
        return view('listecollab', ['collabs'=> $data]);
    }

    function destroyData($id, Request $request)
    {
        if (! $this->authorize('acces-admin', $request->user)) { //verif acces admin
            abort(403);
        }

        $collab = Collab::findOrFail($id);
        $collab->delete();
        return redirect('collaborateur');
    }

    function editData($id, Request $request)
    {
        if (! $this->authorize('acces-gestionnaire')) { //verif acces admin
            abort(403);
        }
        $collab = Collab::findOrFail($id);
        $enterprises = Enterprise::all();
        return view('editcollab', ['collab' => $collab, 'enterprises'=>$enterprises]);
    }


    function updateData(Request $request, $id)
    {
        $collab = Collab::findOrFail($id);
        $data = $request->validate([
            'civilite'=> 'required|string|max:15',
            'nom'=> 'required|string|max:25',
            'prenom'=> 'required|string|max:40',
            'adresse'=> 'required|string|max:100',
            'codePostal'=> 'required|numeric|digits:5',
            'ville'=> 'required|string|max:30',
            'numeroDeTelephone'=> 'required|string|max:20',
            'email'=> 'required|email',
            'enterprise_id'=> 'required|string|max:10'
        ]);
        $collab->civilite = $data['civilite'];
        $collab->nom = $data['nom'];
        $collab->prenom = $data['prenom'];
        $collab->adresse = $data['adresse'];
        $collab->codePostal = $data['codePostal'];
        $collab->ville = $data['ville'];
        $collab->numeroDeTelephone = $data['numeroDeTelephone'];
        $collab->email = $data['email'];
        $collab->enterprise_id = $data['enterprise_id'];
        $collab->save();
        return redirect()->route('collaborateur');
    }
}
