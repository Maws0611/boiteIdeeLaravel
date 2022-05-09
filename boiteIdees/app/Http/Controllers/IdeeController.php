<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idee;
use App\Models\User;

class IdeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idees = Idee::all();
        return view('idee.index', compact('idees'));
    }

    public function create()
    {
        $users = User::all();
        return view('idee.create', compact('users'));
    }

    public function store(Request $request)
     {
        $validation = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string',],
        ]);

        $idee = new Idee();
        $idee->titre = $request->titre;
        $idee->description = $request->description;
        $idee->user_id = $request->user_id;
        $idee->save();
        return redirect('/idees');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::all();
        $idee = Idee::find($id);
        return view('idee.edit', compact('idee', 'users'));

    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string',],
        ]); 
        Idee::whereId($id)->update($validation);
        return redirect('/idees');
    }

    public function destroy($id)
    {
        $idee = Idee::find($id);
        $idee->delete();
        redirect('/idees');
    }
}
