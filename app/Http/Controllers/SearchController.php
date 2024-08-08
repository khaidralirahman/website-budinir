<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Tag;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function search(Request $request)
    {
        $form = Form::query();
        $tagItem = Tag::all();
        $form4 = Form::latest()->take(4)->get();

        if ($request->filled('title')) {
            $form->where('title', 'like', '%' . $request->title . '%');
        }

        $search = $form->get();

        return view('search.index', compact('search', 'form', 'tagItem', 'form4'));
    }
    public function searchTag($tag)
    {
        $form = Form::where('tags', 'like', '%' . $tag . '%')->paginate(10);
        $tagItem = Tag::all();
        $form4 = Form::latest()->take(4)->get();

        return view('search.indextag', compact('form', 'tag', 'tagItem', 'form4'));
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
