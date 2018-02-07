<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cas;

class CasController extends Controller
{
    public function showLoginForm(Request $request) {
        if(!empty($request->query()))
            return $this->processTicket($request);
        return Cas::login(route('register.cas'));
    }

    public function processTicket(Request $request) {
        $user = Cas::auth(route('register.cas'), $request->query('ticket'));
        if ($user == -1)
            dd($user);
        return redirect()->route('register');
    }
}
