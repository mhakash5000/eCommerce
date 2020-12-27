<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Size;
use Session;
use Auth;
use DB;


class SizeController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $size=Size::all();
        // $catCount=Category::count();
        return view('backend.size.size-view', compact('size'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.size.create-size');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sizes,name',

        ]);
       $userData=new Size();
       $userData->created_by=Auth::user()->id;
       $userData->name=$request->name;
       $userData->created_by=$request->created_by;
       $userData->updated_by=$request->updated_by;
       $userData->save();
       Session::flash('success','Product Size Created successfully');
       return redirect()->back();
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
    //edit function is here.......................
    public function edit($id)
    {
        $data=Size::find($id);
        return view('backend.size.edit-size',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Size::find($id);
        $update->updated_by=Auth::user()->id;
        $update->name=$request->name;
        $update->created_by=$request->created_by;
        $update->updated_by=$request->updated_by;
        $update->save();
        Session::flash('success','Product Size Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $size=Size::find($id);
        $size->delete();
       return redirect()->route('size.view');
    }
}

