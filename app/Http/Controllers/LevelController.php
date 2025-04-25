<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'create-name' => 'required'

        ]);

        $level = new Level;
        $level->name = $request->input('create-name');
        $level->save();

        return(back()->with('success-1', "Niveaux d'enseignement créer avec succé !"));
    }


    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required'

        ]);

        $level = Level::findorFail($id);
        $level->name = $request->input('name');
        $level->save();

        return(back()->with('success-1', "Niveaux d'enseignement modifiez avec succé !"));
    }

    public function destroy($id){

        $level = Level::Find($id);
        $level->delete();

        return(back()->with('success-1', "Niveaux d'enseignement supprimé avec succé !"));

    }
}
