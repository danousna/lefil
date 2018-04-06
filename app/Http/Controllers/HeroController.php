<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;
use App\Article;
use Session;

class HeroController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:president|admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('status', 'published')->orderBy('id', 'DESC')->get();
        $heroes = Hero::all();
        return view('heroes.index')->withArticles($articles)->withHeroes($heroes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'premier' => 'required',
            'second' => 'required',
            'dernier' => 'required'
        ));


        $premier = Hero::where('type', 'premier')->first();
        $premier->article_id = $request->premier;
        $premier->save();

        $second = Hero::where('type', 'second')->first();
        $second->article_id = $request->second;
        $second->save();

        $dernier = Hero::where('type', 'dernier')->first();
        $dernier->article_id = $request->dernier;
        $dernier->save();

        Session::flash('success', "Page d'accueil modifiée.");

        return redirect('/');
    }
}
