<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin|president')) {
            $comments = Comment::all();
            return view('comments.index')->withComments($comments);
        } else {
            return redirect()->route('pages.welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $reply_comment_id)
    {
        // Validate the data.
        $this->validate($request, array(
            'body' => 'required',
        ));

        // Store in the database.
        $comment = new Comment;
        $comment->article_id = $id;
        $comment->user_id = Auth::user()->id;
        if ($reply_comment_id == "NULL") {
            $comment->reply_comment_id = NULL;
        } else {
            $comment->reply_comment_id = $reply_comment_id;
        }
        $comment->body = $request->body;
        $comment->save();

        Session::flash('success', 'Commentaire publié.');

        // Redirect to another page.
        return Redirect::to(URL::previous() . "#".$comment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->status = "deleted";
        $comment->save();

        Session::flash('success', 'Commentaire supprimé.');

        // Redirect to another page.
        return redirect()->route('comments.index');
    }
}
