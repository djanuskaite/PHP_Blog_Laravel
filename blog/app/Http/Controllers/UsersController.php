<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function users() {

        $students = [
            'Ieva',
            'Vika',
            'Erika'
        ];

        //dumberis
//        dd($students);
        return view('users', compact('students'));
    }
}
