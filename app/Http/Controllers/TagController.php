<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = Tag::all();
        return view('admin.tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'tag' => 'required|array',
            'tag.*' => 'required|string|max:255',
        ]);

        $titles = $request->input('tag'); // Mengambil input titles
        if ($titles) {
            foreach ($titles as $title) {
                $tag = new Tag();
                $tag->tag = $title;
                $tag->save();
            }
        }

        return redirect('/admin/tag')->with('success', 'Data baru berhasil ditambahkan!');
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
        $tag = Tag::findOrFail($id);
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        $tag = Tag::findOrFail($id);

        $tag->update([
            'tag' => $request->tag,
        ]);

        session()->flash('success', 'Data updated successfully!');

        return redirect()->route('tag.index')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
