<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Session;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(); 
        return view('users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.create', ['roles'=>$roles]);
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
            'name'      => 'required|string|max:255',
            'username'  => 'required|alpha_dash|max:255|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ));

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $roles = $request['roles'];
        
        // Checking if a role was selected
        if (isset($roles)) {     
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();            
                $user->assignRole($role_r);
            }
        }        
        
        // Redirect to the users.index view and display message
        Session::flash('success', 'Utilisateur ajouté');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();

        return view('users.edit')->withUser($user)->withRoles($roles);
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
        $user = User::findOrFail($id);

        // Validate the data.
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

        // Store in the database.
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        $roles = $request['roles'];

        if (isset($roles)) {
            // If one or more role is selected associate user to roles      
            $user->roles()->sync($roles);          
        }        
        else {
            // If no role is selected remove exisiting role associated to a user
            $user->roles()->detach();
        }

        // Redirect to the users.index view and display message
        Session::flash('success', 'Utilisateur modifié');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('success', 'Utilisateur supprimé');
        return redirect()->route('users.index');
    }
}
