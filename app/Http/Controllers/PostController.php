<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        $users = User::all();
        $user = Auth::user();
        $programmes = Programme::all();
        $posts = Post::all();

        return view('admin.posts.index', compact('groups', 'users', 'user', 'programmes', 'posts'));
    }

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
                'model' => 'required',
        ]);

        if($request->model == 'normal'){

            $this->validate($request, [
                'title' => 'required|max:255',
                'content' => 'required',
                'programme_id' => 'required',
                'group_id' => 'required',
                'file' => 'image|nullable|max:1999',
            ]);

            $post = new Post;
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->programme_id = $request->programme_id;
            $post->group_id = $request->group_id;
            if($request->hasFile('file')){
                $post->file = Storage::disk('public')->put('image', $request->file);
            }
            else{
                $post->file = 'image/default.png';
            }
            $post->save();
            return(back()->with('success-1', "Post créé avec succé !"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = Group::all();
        $users = User::all();
        $user = Auth::user();
        $programmes = Programme::all();
        $post = Post::findorFail($id);

        return view('admin.posts.show', compact('groups', 'users', 'user', 'programmes', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
