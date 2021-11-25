<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enterprise;

class EnterpriseController extends Controller
{
    public function addData(Request $request) //ajoute les données
    {
        if (! $this->authorize('acces-gestionnaire')) { //verif acces admin
            abort(403);
        }
        $data = $request->validate([
            'nom'=> 'required|string|unique:enterprises,nom|max:50',
            'adresse'=> 'required|string|max:100',
            'codePostal'=> 'required|numeric|digits:5',
            'ville'=> 'required|string|max:50',
            'numeroDeTelephone'=> 'required|unique:enterprises,numeroDeTelephone|numeric|digits:10',
            'email'=> 'required|email'
        ]);
        Enterprise::create($data);
        return redirect()->route('entreprise');
    }

    function showAdd() {
        if (! $this->authorize('acces-gestionnaire')) { //verif acces admin
            abort(403);
        }
        return view('addenterprise');
    }

    function showAllData()
    {
        $data = Enterprise::paginate(15);
        return view('listenterprises', ['enterprises'=> $data]);
    }
    function searchData(Request $request)
    {
        $search = $request->recherche;
        $data = Enterprise::where('nom','LIKE', '%'.$search.'%')
            ->orWhere('ville','LIKE', '%'.$search.'%')
            ->orWhere('email','LIKE', '%'.$search.'%')
            ->paginate(15);
        return view('listenterprises', ['enterprises'=> $data]);
    }

    function destroyData($id)
    {
        if (! $this->authorize('acces-admin')) { //verif acces admin
            abort(403);
        }
        $enterprise = Enterprise::findOrFail($id);
        $enterprise->delete();
        return redirect('entreprise');
    }
    function editData($id)
    {
        if (! $this->authorize('acces-gestionnaire')) { //verif acces admin
            abort(403);
        }
        $enterprise = Enterprise::findOrFail($id);
        return view('editenterprise', ['enterprise'=>$enterprise]);
    }

    function updateData(Request $request, $id)
    {

        $enterprise = Enterprise::findOrFail($id);
        $data = $request->validate([
            'nom'=> 'required|string|max:50',
            'adresse'=> 'required|string|max:100',
            'codePostal'=> 'required|numeric|digits:5',
            'ville'=> 'required|string|max:50',
            'numeroDeTelephone'=> 'required',
            'email'=> 'required|email'
        ]);
        $enterprise->nom = $data['nom'];
        $enterprise->adresse = $data['adresse'];
        $enterprise->codePostal = $data['codePostal'];
        $enterprise->ville = $data['ville'];
        $enterprise->numeroDeTelephone = $data['numeroDeTelephone'];
        $enterprise->email = $data['email'];
        $enterprise->save();
        return redirect()->route('entreprise');
    }
}
