<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('query')) {
            $query = $request->input('query');
            $notes = Note::where('title', 'LIKE', "%$query%")->get();
        } else {
            $notes = Note::all();
        }
        return view('home.index', compact('notes'));
    }
}
