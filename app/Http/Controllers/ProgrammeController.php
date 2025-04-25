<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProgrammeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $programmes = Programme::latest()->paginate(20);
        $groups = Group::all();
        $user = Auth::user();

        return(view('admin.programmes.index', compact('programmes', 'groups', 'user')));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'item' => 'required|max:255',
            'date' => 'required',
            'body' => 'required|max:255',
            'group_id' => 'required',
        ]);

        $programme = new Programme;
        $programme->item = $request->input('item');
        $programme->body = $request->input('body');
        $programme->date = $request->input('date');
        $programme->group_id = $request->group_id;
        $programme->save();

        return(back()->with('success-1', "Programme créé avec succé !"));
    }



    public function search($search){
        $users = User::latest()->paginate(20);
        $levels = Level::all();
        return(view('admin.users.index', compact('users', 'levels')));
    }


    public function update(Request $request, $id){

        $this->validate($request, [
            'item' => 'required|max:255',
            'date' => 'required',
            'body' => 'required|max:255',
            'group_id' => 'required',
        ]);

        $programme = Programme::findorFail($id);
        $programme->item = $request->input('item');
        $programme->body = $request->input('body');
        $programme->date = $request->input('date');
        $programme->group_id = $request->group_id;
        $programme->save();

        return(back()->with('success-1', 'Programme modifié avec succé !'));
    }

    public function destroy($id){

        $programme = programme::Find($id);
        $programme->delete();

        return(back()->with('success-1', 'Etudiant supprimé avec succé !'));

    }



}
