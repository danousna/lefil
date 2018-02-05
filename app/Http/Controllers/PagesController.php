<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Category;
use Session;

class PagesController extends Controller
{
    public function getIndex() {
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return view('pages.welcome')->withArticles($articles);
    }

    public function getAbout() {
        return view('pages.about');
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function getArticle($year, $month, $day, $slug) {
        $article = Article::where('slug', $slug)->first();
        $article_date = explode('-', substr($article->created_at, 0, 10));

        if ($year == $article_date[0] && $month == $article_date[1] && $day == $article_date[2]) {
            return view('pages.article')->withArticle($article);
        } else {
            Session::flash('error', "Ce lien ne correspond à aucun article. Vous avez été redirigé à l'accueil.");
            return redirect('/');
        }
    }

    public function getCategory($id) {
        $category = Category::find($id);
        $articlesOfCategory = $category->articles;
        return view('pages.category')->withCategory($category)->withArticles($articlesOfCategory);
    }

    public function getUser($username) {
        $user = User::where('username', $username)->first();
        return view('pages.user')->withUser($user);
    }
}
