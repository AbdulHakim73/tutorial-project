<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{




    public function store(Request $request)
    {
        $comment = Comment::create([
            'body' => $request->body,
            'page_id' => $request->page_id,
            'user_id' => 1,
        ]);

        return redirect()->back();
    }
}
