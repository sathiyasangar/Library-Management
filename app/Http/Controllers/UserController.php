<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Crypt;
use Auth;
use Session;
use App\Language;
use App\Book;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Input;
use Validator;

class UserController extends Controller
{
    public function index()
    {

        $query = User::all();

        return view('pages.user.user',compact('query'));
    }
}
