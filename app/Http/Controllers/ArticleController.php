<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Article;
use App\Category;
use App\Issue;
use App\User;
use App\Comment;
use Session;
use Auth;
use Parsedown;
use Image;
use Storage;
use File;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'clearance']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->where('user_id', Auth::user()->id);
        return view('articles.index')->withArticles($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::user()->id);
        $categories = Category::all();
        $issues = Issue::all()->where('status', 'draft');
        
        return view('articles.create')->withUser($user)->withCategories($categories)->withIssues($issues);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data.
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'image'         => 'max:2200|image|mimes:jpeg,jpg,png,gif,svg',
            'category_id'   => 'required|integer',
            'body'          => 'required',
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:articles,slug'
        ));

        // Store in the database.
        $article = new Article;
        $article->user_id = Auth::user()->id;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->category_id = $request->category_id;
        $article->issue_id = $request->issue_id;
        $article->slug = $request->slug;

        if ($request->issue_id)
            $article->status = "issued";

        if ($request->has('image')) {    
            // Image processing.
            $image = Image::make($request->file('image'))->encode('jpg');

            if ($image->width() > 2000)
                $image->resize(2000, null, function ($constraint) {$constraint->aspectRatio();});

            $hash = md5($image->__toString());

            $path = "storage/{$hash}.jpg";
            $image->save(public_path($path));

            $image->resize(200, null, function ($constraint) {$constraint->aspectRatio();})->blur(30);
            $path = "storage/blur-{$hash}.jpg";
            $image->save(public_path($path));
            
            $article->image = $hash.'.jpg';
        } else {
            $article->image = '';
        }

        if ($request->has('anonymous')) {
            $article->anonymous = TRUE;
        }

        $article->save();

        Session::flash('success', 'Article enregistré');

        // Redirect to another page.
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        if (($article->user_id == Auth::user()->id) || 
            ((Auth::user()->hasPermissionTo('publish article')) && ($article->status == 'waiting')) ||
            ((Auth::user()->hasPermissionTo('manage category')) && ($article->status == 'issued'))
            ) {
            // Parse the markdown to html.
            $Parsedown = new Parsedown();
            $article->body = $Parsedown->text($article->body);

            return view('articles.show')->withArticle($article);
        } else {
            $date = explode('-', substr($article->created_at, 0, 10));
            return redirect(url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        if ($article->user_id == Auth::user()->id) {
            $user = User::find(Auth::user()->id);
            $categories = Category::all();
            $issues = Issue::all();
            return view('articles.edit')->withArticle($article)->withUser($user)->withCategories($categories)->withIssues($issues);
        } else {
            Session::flash('error', 'Vous ne pouvez pas modifier cet article');
            return redirect('/');
        }
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
        $article = Article::find($id);

        // Validate the data.
        if ($request->input('slug') == $article->slug) {
            $this->validate($request, array(
                'title'         => 'required|max:255',
                'image'         => 'max:2200|image|mimes:jpeg,jpg,png,gif,svg',
                'category_id'   => 'required|integer',
                'body'          => 'required',
            ));
        } else {
            $this->validate($request, array(
                'title'         => 'required|max:255',
                'image'         => 'max:2200|image|mimes:jpeg,jpg,png,gif,svg',
                'category_id'   => 'required|integer',
                'body'          => 'required',
                'slug'          => 'required|alpha_dash|min:5|max:255|unique:articles,slug'
            ));
        }

        // Store in the database.
        $article->user_id = Auth::user()->id;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->category_id = $request->category_id;
        $article->issue_id = $request->issue_id;
        $article->slug = $request->slug;

        if ($request->issue_id) 
            $article->status = "issued";

        if (!$request->issue_id && $article->status != "published")
            $article->status = "draft";

        if ($request->has('image')) {  
            // Delete old image.
            Storage::disk('public')->delete($article->image);
            Storage::disk('public')->delete('blur-'.$article->image);

            // Image processing.
            $image = Image::make($request->file('image'))->encode('jpg');

            if ($image->width() > 2000)
                $image->resize(2000, null, function ($constraint) {$constraint->aspectRatio();});

            $hash = md5($image->__toString());

            $path = "storage/{$hash}.jpg";
            $image->save(public_path($path));

            $image->resize(200, null, function ($constraint) {$constraint->aspectRatio();})->blur(30);
            $path = "storage/blur-{$hash}.jpg";
            $image->save(public_path($path));
            
            $article->image = $hash.'.jpg';
        }

        if ($request->has('anonymous')) {
            $article->anonymous = TRUE;
        } else {
            $article->anonymous = FALSE;
        }

        $article->save();

        Session::flash('success', 'Article modifié.');

        // Redirect to another page.
        return redirect()->route('articles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if ($article->user_id == Auth::user()->id) {
            Storage::disk('public')->delete($article->image);
            Storage::disk('public')->delete('blur-'.$article->image);
            $article->comments()->delete();
            $article->delete();
            Session::flash('success', 'Article supprimé.');
            return redirect()->route('articles.index');
        } else {
            Session::flash('error', 'Vous ne pouvez pas supprimer cet article.');
            return redirect('/');
        }
    }

    /**
     * Change article status to 'waiting'.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publishRequest(Request $request, $id) 
    {
        $article = Article::find($id);

        $article->status = 'waiting';
        $article->save();

        Session::flash('success', 'Votre demande de publication a été prise en compte.');
        return redirect()->route('articles.index');
    }
}
