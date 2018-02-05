<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use Session;
use Auth;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('categories.create')->withUsers($users);
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
            'name' => 'required|max:255|unique:categories,name'
        ));

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        $users = $request['users'];
        foreach ($users as $user) {
            $user = User::find($user);
            $user->categories()->attach($category->id);
        }

        Session::flash('success', 'Catégorie ajoutée');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $users = User::all();
        return view('categories.edit')->withCategory($category)->withUsers($users);
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
        $category = Category::find($id);

        if ($category->name != $request['name']) {
            $this->validate($request, array(
                'name' => 'required|max:255|unique:categories,name'
            ));
        }

        $category->name = $request->name;
        $category->users()->detach();

        $category->save();

        $users = $request['users'];
        foreach ($users as $user) {
            $user = User::find($user);
            $user->categories()->attach($category->id);
        }

        Session::flash('success', 'Catégorie modifiée');

        return redirect()->route('categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
