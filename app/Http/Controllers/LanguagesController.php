<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguagesController extends Controller
{
    public function getLanguages()
    {
        $language = DB::select('select * from languages');
        return $language;
    }
}
