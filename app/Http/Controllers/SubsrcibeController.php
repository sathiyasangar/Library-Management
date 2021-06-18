<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Crypt;
use Auth;
use Session;
use App\Language;
use App\Book;
use App\Subscription;
use Redirect;
use Illuminate\Support\Facades\Input;
use Validator;

class SubsrcibeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user_id = Auth::user()->id;
        $subscribtion = Subscription::where('user_id', $user_id)->count();
        if($subscribtion > 0){
            $query = DB::table('book')
            ->join('subscription', 'book.id', '=', 'subscription.book_id')
            ->select('book.*','subscription.*')
            ->where('subscription.user_id','=',$user_id)
            ->get();
        }
        else{
            $query = Subscription::where('user_id', $user_id)->get();
        }

        return view('pages.subscribe.subscribe',compact('query'));
    }

    
    public function destroy($id)
    {
        $id = $id;
        $data = Subscription::where('id',$id)->delete();
        Session::flash('delete', "Unsubscribe Removed Successfully");
        return redirect()->to('/subscribe');
    }
    
}
