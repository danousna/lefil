<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Category;
use Auth;
use Session;

class AccountController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('account.index')->withUser($user);
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
        $user = User::find(Auth::user()->id);
        $categories = Category::all();
        return view('account.edit')->withUser($user)->withCategories($categories);
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
        $user = User::find(Auth::user()->id);

        // Validate the data.
        if ($request->input('password') == "") {
            if ($request->input('username') == $user->username) {
                $this->validate($request, array(
                    'name'      => 'required|string|max:255',
                    'email'     => 'required|string|email|max:255|unique:users,email,'.$id,
                ));
            } else {
                $this->validate($request, array(
                    'name'      => 'required|string|max:255',
                    'username'  => 'required|alpha_dash|max:255|unique:users',
                    'email'     => 'required|string|email|max:255|unique:users,email,'.$id,
                ));
            }
        } else {
            if ($request->input('username') == $user->username) {
                $this->validate($request, array(
                    'name'      => 'required|string|max:255',
                    'email'     => 'required|string|email|max:255|unique:users,email,'.$id,
                    'password'  => 'required|string|min:6|confirmed',
                ));
            } else {
                $this->validate($request, array(
                    'name'      => 'required|string|max:255',
                    'username'  => 'required|alpha_dash|max:255|unique:users',
                    'email'     => 'required|string|email|max:255|unique:users,email,'.$id,
                    'password'  => 'required|string|min:6|confirmed',
                ));
            }
        }

        // Store in the database.
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->input('password') != "") {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        Session::flash('success', 'Informations modifiées');

        return redirect()->route('account.index');
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
