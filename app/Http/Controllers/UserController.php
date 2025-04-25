<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function verify($id){
        $user = User::find($id);
        $user->verified = 1;
        $user->save();
        return back();

    }

    public function unverify($id){
        $user = User::find($id);
        $user->verified = 0;
        $user->save();
        return back();
    }

    public function users(){
        $users = User::orderBy('name', 'ASC')->paginate(20);
        $levels = Level::all();
        $groups = Group::all();
        return(view('admin.users.index', compact('users', 'levels', 'groups')));
    }

    public function search($search){
        $users = User::latest()->paginate(20);
        @
        $levels = Level::all();
        return(view('admin.users.index', compact('users', 'levels')));
    }


    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'level_id' => 'required',
        ]);

        $user = User::findorFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->level_id = $request->level_id;
        $user->save();

        return(back()->with('success-1', 'Etudiant modifiez avec succé !'));
    }

    public function destroy($id){

        $user = User::FindorFail($id);
        if($user->admin == 1){
            return back()->with('error', 'Vous ne pouvez pas supprimer un administrateur !');
        }
        $user->delete();

        return(back()->with('success-1', 'Etudiant supprimé avec succé !'));

    }



}
