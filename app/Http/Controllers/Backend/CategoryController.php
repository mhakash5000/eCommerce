<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Category;
use Session;
use Auth;
use DB;


class CategoryController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $category=Category::all();
        // $catCount=Category::count();
        return view('backend.category.category-view', compact('category'));
    }

      //Create function is here......................................
      public function create()
      {
          return view('backend.category.create-category');
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name',

        ]);
       $userData=new Category();
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
        $data=Category::find($id);
        return view('backend.category.edit-category',compact('data'));
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        $update=Category::find($id);
        $update->updated_by=Auth::user()->id;
        $update->name=$request->name;
        $update->created_by=$request->created_by;
        $update->updated_by=$request->updated_by;
        $update->save();
        Session::flash('success','Category Updated successfully');
       return redirect()->back();
    }

    //delete function is here...........................
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
       return redirect()->route('category.view');
    }
}
