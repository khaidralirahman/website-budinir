<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Form;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = Form::latest()->paginate(5); // Use paginate instead of get
        $tag = Tag::all();
        return view('admin.form.index', compact('form', 'tag'));
    }

    public function detail(string $id)
    {
        $form = Form::with('comment.user', 'likes.user')->findOrFail($id);
        $tag = Tag::all();
        return view('admin.form.detail', compact('form', 'tag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tag = Tag::all();
        return view('admin.form.form', compact('tag'));
    }

    public function search(Request $request)
    {
        $form = Form::query();

        if ($request->filled('nama')) {
            $form->where('title', 'like', '%' . $request->nama . '%');
        }

        if ($request->filled('tags')) {
            $form->where('tags', $request->input('tags'));
        }

        if ($request->filled('created_at')) {
            $dates = explode(' to ', $request->created_at);
            if (count($dates) == 2) {
                $startDate = $dates[0];
                $endDate = $dates[1];
                $form->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        $search = $form->get();

        $tag = Tag::all();

        return view('admin.form.search', compact('search', 'tag', 'form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataUpload = new Form();
        $dataUpload->title = $request->title;
        $dataUpload->tags = $request->tags;
        $tagsArray = $request->tags ?? []; // Default to an empty array if not provided
        $dataUpload->tags = implode(',', $tagsArray); // Convert array to comma-separated string
        $dataUpload->description = $request->description;
        $dataUpload->contributor = $request->contributor;

        if ($request->hasFile('photo')) {
            $upload = $request->file('photo');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/photo'), $nameFile);
            $dataUpload->photo = $nameFile;
        }

        // Generate slug from title
        $slug = Str::slug($request->title);
        // Check if the generated slug already exists, if so, append a number to make it unique
        $i = 1;
        while (Form::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->title . '-' . $i);
            $i++;
        }
        $dataUpload->slug = $slug;

        $dataUpload->save();

        return redirect('/admin/form')->with('success', 'New data added successfully!');
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
        $form = Form::findOrFail($id);
        $tag = Tag::all();
        return view('admin.form.edit', compact('tag', 'form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $form = Form::findOrFail($id);

    $images = [];

    // Cek jika ada file gambar baru untuk photo
    if ($request->hasFile('photo')) {
        $new_image = time() . rand(100, 999) . '.' . $request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move(public_path('assets/photo'), $new_image);
        $images[] = $new_image;
    } else {
        $images[] = $form->photo;
    }

    // Generate slug from title if title is changed
    if ($request->title != $form->title) {
        $slug = Str::slug($request->title);
        $i = 1;
        while (Form::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = Str::slug($request->title . '-' . $i);
            $i++;
        }
        $form->slug = $slug;
    }

    // Update form data
    $form->update([
        'title' => $request->title,
        'tags' => implode(',', $request->tags),
        'description' => $request->description,
        'contributor' => $request->contributor,
        'photo' => $images[0],
    ]);

    $form->save();

    session()->flash('success', 'Data updated successfully!');

    return redirect('/admin/form')->with('success', 'Data updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $form = Form::findOrFail($id);

        // Define an array of file attributes
        $fileAttributes = [
            'photo',
        ];

        // Loop through each attribute and delete the associated file if it exists
        foreach ($fileAttributes as $attribute) {
            if ($form->$attribute) {
                // Adjust the path according to where the files are stored
                $path = 'public/assets/photo/' . $form->$attribute;
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
        }

        // Delete the record from the database
        $form->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
