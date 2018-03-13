<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spotted;
use Session;

class SpottedController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:member|president|admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spotted = Spotted::all()->where('status', 'draft');
        return view('spotted_manager.index')->withSpotted($spotted);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spotted = Spotted::find($id);
        $spotted->status = "published";
        $spotted->save();

        Session::flash('success', 'Message publié !');
        return redirect()->route('spotted_manager.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spotted = Spotted::find($id);
        return view('spotted_manager.edit')->withSpotted($spotted);
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
            'body'      => 'required',
        ));

        $spotted = Spotted::find($id);

        $spotted->body = $request->body;

        $spotted->save();
        
        Session::flash('success', "Message modifié.");
        return redirect()->route('spotted_manager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spotted = Spotted::find($id);
        $spotted->delete();
        Session::flash('success', 'Message supprimé.');
        return redirect()->route('spotted_manager.index');
    }
}
