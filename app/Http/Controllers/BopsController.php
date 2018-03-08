<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bops;
use Session;

class BopsController extends Controller
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
        $bops = Bops::all()->where('status', 'draft');
        return view('bops_manager.index')->withBops($bops);
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
        $bops = Bops::find($id);
        $bops->status = "published";
        $bops->save();

        Session::flash('success', 'Bops publiée !');
        return redirect()->route('bops_manager.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bops = Bops::find($id);
        return view('bops_manager.edit')->withBops($bops);
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
            'uv'        => 'required|max:4|regex:/[A-Z0-9]/',
            'body'      => 'required',
        ));

        $bops = Bops::find($id);

        $bops->uv = $request->uv;
        $bops->body = $request->body;

        $bops->save();
        
        Session::flash('success', "Bops modifiée.");
        return redirect()->route('bops_manager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bops = Bops::find($id);
        $bops->delete();
        Session::flash('success', 'Bops supprimée.');
        return redirect()->route('bops_manager.index');
    }
}
