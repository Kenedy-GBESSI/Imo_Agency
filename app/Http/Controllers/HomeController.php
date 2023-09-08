<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $properties = Property::with('images')->recent()->limit(4)->get();

        // dd(Property::first()->created_at); To test $casts attributs of model property

        // dd(User::all()->last());



        return view('home',[
            'properties' => $properties
        ]);
    }
}
