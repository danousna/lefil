<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use Session;

class IssueController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'permission:manage category']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::all();
        return view('issues.index')->withIssues($issues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issues.create');
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
            'number' => 'required|integer|unique:issues,number',
            'release_date' => 'required|date_format:"Y-m-d"|after:now',
        ));

        $issue = new Issue;
        $issue->number = $request->number;
        $issue->titre = $request->titre;
        $issue->release_date = $request->release_date;
        $issue->save();

        Session::flash('success', 'Numéro ajouté, vos rédacteurs pourront soumettre leur articles pour ce numéro.');

        return redirect()->route('issues.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue = Issue::find($id);

        return view('issues.show')->withIssue($issue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issue = Issue::find($id);
        $issue->release_date = explode(' ', $issue->release_date)[0];
        return view('issues.edit')->withIssue($issue);
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
        $this->validate($request, array(
            'number' => 'required|integer',
            'release_date' => 'required|date_format:"Y-m-d"|after:now',
        ));

        $issue = Issue::find($id);
        $issue->number = $request->number;
        $issue->titre = $request->titre;
        $issue->release_date = $request->release_date;
        $issue->save();

        Session::flash('success', 'Numéro modifié');

        return redirect()->route('issues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issue = Issue::find($id);

        foreach($issue->articles as $article) {
            $article->issue_id = NULL;
            $article->status = "draft";
            $article->save();
        }

        $issue->delete();
        Session::flash('success', 'Numéro supprimé.');
        return redirect()->route('issues.index');
    }
}
