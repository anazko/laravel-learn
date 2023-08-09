<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
      return view('tags');
    }

    public function show(Tag $tag) {
      return 'tag ' . $tag->name;
    }
}
