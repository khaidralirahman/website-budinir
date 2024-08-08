<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Form = Form::with(['comment', 'likes'])->latest()->take(10)->get();
        $comment = Comment::all();
        return view('admin.comment.index', compact('Form'));
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

        $form = Form::where('slug', $slug)->firstOrFail();

        Comment::create([
            'form_id' => $form->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Comment added successfully.');
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
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
