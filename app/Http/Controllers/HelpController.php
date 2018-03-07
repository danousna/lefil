<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function getIndex() 
    {
        return view('help.markdown');
    }

    public function getMarkdown() 
    {
        return view('help.markdown');
    }
}
