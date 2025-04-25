<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GroupController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function show($id){
        $groups = Group::all();
        $group = Group::findorFail($id);
        $actualgroup = Group::findorFail($id);
        $levels = Level::all();
        $user = Auth::user();
        $users = User::all();
        $programmes = Programme::where('group_id', $id)->orderBy('date', 'asc')->get();
        return(view('admin.classes.group', compact('actualgroup', 'users', 'levels', 'groups', 'group', 'user', 'programmes')));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'level_id' => 'required',

        ]);

        $group = new Group;
        $group->name = $request->input('name');
        $group->level_id = $request->level_id;
        $group->save();

        return(back()->with('success-1', "Niveaux d'enseignement créer avec succé !"));
    }


    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required'

        ]);

        $group = Group::findorFail($id);
        $group->name = $request->input('name');
        $group->level_id = $request->level_id;
        $group->save();

        return(back()->with('success-1', "Groupe modifiez avec succé !"));
    }

    public function destroy($id){

        $group = Group::Find($id);
        $group->delete();

        return(back()->with('success-1', 'Groupe supprimé avec succé !'));

    }

    public function add_user(Request $request, $id){
        $this->validate($request, [
            'usersnames' => 'required'

        ]);

        $user = User::find($request->usersnames);
        $group = Group::find($id);
        $groupusers = $group->users;
        foreach ($groupusers as $groupuser) {

            if($groupuser->id == $user->id){
                return(back()->with('error', "Etudiant déjà dans le groupe !"));

            }
        }

        $user->groups()->attach($id);

        return(back()->with('success-1', "Etudiant ajouté avec succé !"));
    }

    public function remove_user(Request $request, $id){
        $this->validate($request, [
            'userid' => 'required'
        ]);

        $user = User::find($request->input('userid'));
        $user->groups()->detach($id);

        return(back()->with('error', "Etudiant retirer avec succé !"));
    }

}

