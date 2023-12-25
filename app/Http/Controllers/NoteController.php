<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('note.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'category_id' => 'required|string|max:100',
            'image' => 'image|mimes:jpg,jpeg,png,svg',
            'content' => 'required|string|max:100',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('notes_image', 'public');
        }

        Note::create($validatedData);
        return redirect()->route('home')->with('success', 'Note berhasil dibuat');
    }


    public function edit(Note $note)
    {
        $categories = Category::all();
        return view('note.edit', compact('note', 'categories'));
    }


    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'category_id' => 'required|string|max:100',
            'image' => 'image|mimes:jpg,jpeg,png,svg',
            'content' => 'required|string|max:100',
        ]);

        $image = $note->image;
        if ($request->hasFile('image')) {
            Storage::delete($note->image);
            $image = $request->file('image')->store('note_image', 'public');
        }

        $note->update([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "image" => $image,
            "content" => $request->content,
        ]);

        return redirect()->route('home')->with('edit', 'Note berhasil di edit');
    }


    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('home')->with('delete', 'Note berhasil di hapus');
    }
}
