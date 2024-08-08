<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = Form::all();
        $form4 = Form::latest()->take(4)->get();
        $tagItem = Tag::all();
        return view('blog.index', compact('form', 'form4', 'tagItem'));
    }

    public function detail($slug)
    {
        $Form = Form::where('slug', $slug)->with(['comment', 'likes'])->firstOrFail();
        $form2 = Form::latest()->take(2)->get();
        $tagItem = Tag::all();
        $liked = $Form->likes->where('user_id', Auth::id())->count() > 0;
        // Increment the view count
        $Form->increment('views');
        return view('blog.detail', compact('Form', 'form2', 'tagItem', 'liked'));
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
    public function store(Request $request)
    {
        //
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
