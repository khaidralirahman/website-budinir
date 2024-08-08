<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to like an article.');
        }

        $user = Auth::user();
        $form = Form::where('slug', $slug)->firstOrFail();

        $like = Like::where('form_id', $form->id)->where('user_id', $user->id)->first();

        if ($like) {
            // Jika like sudah ada, maka hapus like (unlike)
            $like->delete();
            return back()->with('success', 'You unliked the article.');
        } else {
            // Jika like belum ada, simpan like baru
            Like::create([
                'form_id' => $form->id,
                'user_id' => $user->id
            ]);
            return back()->with('success', 'You liked the article.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
