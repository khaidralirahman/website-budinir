<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Inbox;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tagItem = Tag::all();
        return view('contact.index', compact('tagItem'));
    }

    public function message()
    {
        $messages = Inbox::latest()->paginate(5);
        return view('admin.message.index', compact('messages'));
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
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to like an article.');
        }

        $newdata = new Inbox();
        $newdata->name = $request->name;
        $newdata->user_id = Auth::id();
        $newdata->email = $request->email;
        $newdata->phone = $request->phone;
        $newdata->address = $request->address;
        $newdata->message = $request->message;

        $newdata->save();

        return back()->with('success', 'pesan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $messages = Inbox::findOrFail($id);
        return response()->json($messages);
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
        $messages = Inbox::findOrFail($id);
        $messages->delete();

        return back()->with('success', 'pesan berhasil dihaspus!');
    }
}
