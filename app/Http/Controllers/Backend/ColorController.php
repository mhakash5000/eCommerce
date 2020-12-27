<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Color;
use Session;
use Auth;
use DB;


class ColorController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $color=Color::all();
        // $catCount=Category::count();
        return view('backend.color.color-view', compact('color'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.color.create-color');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:colors,name',

        ]);
       $userData=new Color();
       $userData->created_by=Auth::user()->id;
       $userData->name=$request->name;
       $userData->created_by=$request->created_by;
       $userData->updated_by=$request->updated_by;
       $userData->save();
       Session::flash('success','Color Created successfully');
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
        $data=Color::find($id);
        return view('backend.color.edit-color',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Color::find($id);
        $update->updated_by=Auth::user()->id;
        $update->name=$request->name;
        $update->created_by=$request->created_by;
        $update->updated_by=$request->updated_by;
        $update->save();
        Session::flash('success','Color Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $color=Color::find($id);
        $color->delete();
       return redirect()->route('color.view');
    }
}

