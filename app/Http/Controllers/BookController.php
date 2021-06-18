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
use App\UserManagement;
use Redirect;
use Illuminate\Support\Facades\Input;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $query = Book::orderBy('id','desc')->get();

        return view('pages.book.book',compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::get();
        return view('pages.book.addbook',compact('languages'));
    }

    public function bulk()
    {
        return view('pages.book.bulkupload');
    }
    public function bookdetailupload(Request $request)
	{
		
        $file = $request->file;
  
        $fileName = 'Book_'.time().'_'.$file->getClientOriginalName(); 

   
        $request->file->move(public_path(), $fileName);
        
        $handle = fopen($fileName, "read");
        $header = false;

        while ($csvLine = fgetcsv($handle, 1000, ",")) {

            if ($header) {
                $header = true;
            } 
            else {
                Book::create([
                    'id' => $csvLine[0],
                    'book' => $csvLine[1],
                    'author' => $csvLine[2],
                    'publication' => $csvLine[3],
                    'language' => $csvLine[4],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }
        }
        
        Session::flash('success', "Book Inserted Successfully");
        return redirect()->to('/book');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $id    = $request->id;

        $book_validate = Validator::make($input, ['book' => 'required','author' => 'required','language' => 'required','publication' => 'required', ]);
        if($book_validate->fails()){
            Session::flash('message', "Please Check One More Time Some Fields Are Missing ");
            return Redirect::back()->withInput($request->all());
        }
        $input = $request->except(['_token']);
        if(empty($id))
        {
            $query   = Book::create($input);
            Session::flash('success', "Book Inserted Successfully");
            return redirect()->to('/book');
        }
        elseif(!empty($id))
        {
            $editquery   = Book::where('id',$id)->update($input);  
            $query = Book::orderBy('id','asc')->paginate(10);
            Session::flash('update', "Book Updated Successfully");
            return redirect()->to('/book');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = substr($id, 4);
        $id = Crypt::decrypt($id);
        $book = Book::where('id', $id)->first();
        $languages  = Language::get();
        return view('pages.book.addbook', compact('book','languages'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = $id;
        $data = Book::where('id',$id)->delete();
        Session::flash('delete', "Book Deleted Successfully");
        return redirect()->to('/book');
    }
    
    public function subscribe($id)
    {
        $id = $id;
        $user_id = Auth::user()->id;
        $data = Subscription::create(['user_id' =>$user_id,'book_id' =>$id]);
        Session::flash('Subscribe', "Book Subscribe Successfully");
        return redirect()->to('/book');
    }
}
