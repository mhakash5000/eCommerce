<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Brand;
use Session;
use Auth;
use DB;


class BrandController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $brand=Brand::all();
        // $catCount=Category::count();
        return view('backend.brand.brand-view', compact('brand'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.brand.create-brand');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:brands,name',

        ]);
       $userData=new Brand();
       $userData->created_by=Auth::user()->id;
       $userData->name=$request->name;
       $userData->created_by=$request->created_by;
       $userData->updated_by=$request->updated_by;
       $userData->save();
       Session::flash('success','Category Created successfully');
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
        $data=Brand::find($id);
        return view('backend.brand.edit-brand',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Brand::find($id);
        $update->updated_by=Auth::user()->id;
        $update->name=$request->name;
        $update->created_by=$request->created_by;
        $update->updated_by=$request->updated_by;
        $update->save();
        Session::flash('success','Brand Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $brand=Brand::find($id);
        $brand->delete();
       return redirect()->route('brand.view');
    }
}

