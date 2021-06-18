<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Book;
use Auth;
use DB;
use App\Subscription;
use App\UserManagement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $book = Book::all();
        $bookCount = count($book);

        $subscribe = Subscription::all();
        $subscribeCount = count($subscribe);

        
        $user_id = Auth::user()->id;
        $usersubscribeCount = DB::table('book')
                            ->join('subscription', 'book.id', '=', 'subscription.book_id')
                            ->select('book.*','subscription.*')
                            ->where('subscription.user_id','=',$user_id)
                            ->count();  

        $language = Language::all();
        $languageCount = count($language);

        $user = UserManagement::all();
        $userCount = count($user);
        
        return view('home',compact('bookCount','subscribeCount','languageCount','userCount','usersubscribeCount'));
    }
}
