<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function create() {
      $tags = Tag::all();
      return view('tests', compact('tags'));
    }

    public function store(Request $request) {
      dump($request->input('tags'));
      return 'store';

    }

}

