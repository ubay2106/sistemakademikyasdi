<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function ra()
    {
        return view('page.pendidikan.radarussalam');
    }
    public function mi()
    {
        return view('page.pendidikan.midarussalam');
    }
    public function mts()
    {
        return view('page.pendidikan.mtsdarussalam');
    }
}
