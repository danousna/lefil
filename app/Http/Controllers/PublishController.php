<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;
use App\Article;
use App\Category;

class PublishController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission:publish article']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Auth::user()->categories;
        return view('publish.index')->withCategories($categories);
    }

    public function publish($id) 
    {
        $article = Article::find($id);

        // President can publish everything
        if (Auth::user()->hasRole(['admin', 'president'])) {
            $article->status = 'published';
            $article->published_at = Carbon::now();
            $article->save(); 
            Session::flash('success', 'Article publié');
            return redirect()->route('articles.show', $id);
        }

        // Member can publish their articles and the articles in their category.
        if (Auth::user()->hasRole('member')) {
            if ($article->category->users->where('id', Auth::user()->id)->count() == 0) {       
                Session::flash('error', 'Vous n\'êtes pas responsable de cette rubrique');
                return redirect('/');
            } else {
                $article->status = 'published';
                $article->published_at = Carbon::now();
                $article->save();           
                Session::flash('success', 'Article publié');
                return redirect()->route('articles.show', $id);
            }
        } else {
            Session::flash('error', 'Vous devez être membre pour publier');
            return redirect('/');
        }
    }

    public function refuse($id) {
        $article = Article::find($id);

        // President can publish everything
        if (Auth::user()->hasRole(['admin', 'president'])) {
            $article->status = 'draft';
            $article->save();           
            Session::flash('success', 'Article réfusé');
            return redirect()->route('publish.index', $id);
        }

        // Member can publish their articles and the articles in their category.
        if (Auth::user()->hasRole('member')) {
            if (empty($article->category->users[Auth::user()->id])) {                
                Session::flash('error', 'Vous n\'êtes pas responsable de cette rubrique');
                return redirect('/');
            } else {
                $article->status = 'draft';
                $article->save();           
                Session::flash('success', 'Article réfusé');
                return redirect()->route('publish.index', $id);
            }
        } else {
            Session::flash('error', 'Vous devez être membre pour publier');
            return redirect('/');
        }
    }
}
