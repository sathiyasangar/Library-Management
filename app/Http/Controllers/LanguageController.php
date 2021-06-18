<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Crypt;
use Session;
use App\Language;
use Redirect;
use Illuminate\Support\Facades\Input;
use Validator;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Language::orderBy('id','desc')->paginate(10);
        return view('pages.language.language',compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.language.addlanguage');
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

        $language_validate = Validator::make($input, ['language' => 'required']);
        if($language_validate->fails()){
            Session::flash('message', "Please Check One More Time Some Fields Are Missing ");
            return Redirect::back()->withInput($request->all());
        }
        $input = $request->except(['_token']);
        if(empty($id))
        {
            $query   = Language::create($input);
            Session::flash('success', "Language Inserted Successfully");
            return redirect()->to('/language');
        }
        elseif(!empty($id))
        {
            $editquery   = Language::where('id',$id)->update($input);  
            $query = Language::orderBy('id','asc')->paginate(10);
            Session::flash('update', "Lanugage Updated Successfully");
            return view('pages.language.language',compact('query'));
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
        $language   = Language::where('id', $id)->first();
        return view('pages.language.addlanguage', compact('language'));
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
        $data = Language::where('id',$id)->delete();
        Session::flash('delete', "Language Deleted Successfully");
        return redirect()->to('/language');
    }
}
