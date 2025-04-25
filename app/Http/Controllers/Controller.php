<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use Illuminate\http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){
        $user = Auth::user();
        $groups = Group::all();
        if($user->admin == 1){
            return redirect(route('admin'));
        }
        return(view('dashboard', compact('user')));
    }

    public function admin(){
        $user = Auth::user();
        $groups = Group::all();
        if($user->admin == 0){
            return redirect(route('home'));
        }
        return(view('admin.dashboard', compact('user', 'groups')));
    }
    public function classes(){
        $levels = Level::all();
        $groups = Group::all();
        $user = Auth::user();
        return(view('admin.classes.index', compact('levels', 'groups', 'user')));
    }


    public function upload(Request $request){

        $imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }

}
