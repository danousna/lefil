<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\User;
use App\Article;
use App\Category;
use App\Issue;
use App\Comment;
use Session;
use Parsedown;

class PagesController extends Controller
{
    public function getIndex() 
    {
        $articles = Article::where('status', 'published')->orderBy('id', 'desc')->paginate(10);
        return view('pages.welcome')->withArticles($articles);
    }

    public function getAbout() 
    {
        return view('pages.about');
    }

    public function getContact() 
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, array(
            'name'      => 'required',
            'email'     => 'required|email',
            'message'   => 'required',
        ));

        Mail::to("jeremy.pointel@etu.utc.fr")
            ->cc("natan.danous@gmail.com")
            ->send(new ContactMessage($request));
        
        Session::flash('success', "Message envoyé.");
        return redirect('/contact'); 
    }

    public function getArticle($year, $month, $day, $slug) 
    {
        $article = Article::where('status', 'published')->where('slug', $slug)->first();
        
        if (!is_object($article)) {
            Session::flash('error', "Ce lien ne correspond à aucun article.");
            return redirect('/');
        }

        $article_date = explode('-', substr($article->created_at, 0, 10));

        if ($year == $article_date[0] && $month == $article_date[1] && $day == $article_date[2]) {

            $Comment = new Comment();
            $comments = $Comment->buildCommentsTree($article->comments()->get()->toArray());
            $count = $article->comments()->count();
            
            $Parsedown = new Parsedown();
            $article->body = $Parsedown->text($article->body);
            
            return view('pages.article')
                ->withArticle($article)
                ->withComments($comments)
                ->withCount($count);
        } else {
            Session::flash('error', "Ce lien ne correspond à aucun article.");
            return redirect('/');
        }
    }

    public function getCategories() 
    {
        $categories = Category::all();
        return view('pages.categories')->withCategories($categories);
    }

    public function getCategory($id) 
    {
        $category = Category::find($id);
        return view('pages.category')->withCategory($category);
    }

    public function getIssues() 
    {
        $issues = Issue::all();
        return view('pages.issues')->withIssues($issues);
    }

    public function getIssue($number)
    {
        $issue = Issue::where('number', $number)->first();
        return view('pages.issue')->withIssue($issue);
    }

    public function getUser($username) 
    {
        $user = User::where('username', $username)->first();
        return view('pages.user')->withUser($user);
    }
}
