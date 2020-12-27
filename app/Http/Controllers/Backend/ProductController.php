<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Category;
use App\model\Brand;
use App\model\Color;
use App\model\Size;
use App\model\Product;
use App\model\ProductColor;
use App\model\ProductSize;
use App\model\ProductSubImage;
use Session;
use Auth;
use DB;
use App\Http\Requests\ColorRequest;


class ProductController extends Controller
{
    //view function is here......................................
    public function index()
    {
        $productData['products']=Product::all();
        // $catCount=Category::count();
        return view('backend.product.view-product',$productData);
    }

      //Create function is here......................................
      public function create()
      {
          $data['categories']=Category::all();
          $data['brands']=Brand::all();
          $data['colors']=Color::all();
          $data['sizes']=Size::all();
          return view('backend.product.create-product',$data);
      }

    //Store function is here..........................
    public function store(Request $request)
    {
        DB::transaction(function () use($request) {
            $validatedData = $request->validate([
                'name' => 'required|unique:products,name',
                'color_id' => 'required',
                'brand_id' => 'required',

            ]);
        });

       $ProductData=new Product();
       $ProductData->category_id=$request->category_id;
       $ProductData->brand_id=$request->brand_id;
       $ProductData->name=$request->name;
       $ProductData->short_desc=$request->short_desc;
       $ProductData->long_desc=$request->long_desc;
       $ProductData->price=$request->price;
       $img=$request->file('image');
       if($img){
           $imgName=date('YmdHi').$img->getClientOriginalName();
           $img->move('public/upload/user_images/',$imgName);
           $ProductData['image']=$imgName;
       }
        if($ProductData->save()){
            $files=$request->sub_image;
            if(!empty($files)){
                foreach($files as $file){
                    $imgName=date('YmdHi').$img->getClientOriginalName();
                    $file->move('public/upload/user_images/product_sub_images',$imgName);
                    $subimage['sub_image']=$imgName;
                    $subimage=new ProductSubImage();
                    $subimage->product_id=$ProductData->id;
                    $subimage->sub_image=$imgName;
                    $subimage->save();
                }
            }
            $colors=$request->color_id;
            if(!empty($colors)){
                foreach($colors as $color){
                    $myColor=new ProductColor();
                    $myColor->product_id=$ProductData->id;
                    $myColor->color_id=$color;
                    $myColor->save();
                }
            }
            $sizes=$request->size_id;
            if(!empty($sizes)){
                foreach($sizes as $size){
                    $mySize=new ProductSize();
                    $mySize->product_id=$ProductData->id;
                    $mySize->size_id=$size;
                    $mySize->save();
                }
            }
       }else{
           return redirect()->back()->with('error','Data Not Sent');
       }

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
        $data['productsEdit']=Product::find($id);
        $data['categories']=Category::all();
        $data['brands']=Brand::all();
        $data['colors']=Color::all();
        $data['sizes']=Size::all();
        return view('backend.product.create-product',$data);
    }

    //update function is here.......................
    public function update(Request $request, $id)
    {
        DB::transaction(function () use($request) {
            $validatedData = $request->validate([
                'name' => 'required|unique:products,name',
                'color_id' => 'required',
                'brand_id' => 'required',

            ]);
        });

       $UpdateProduct=Product::find($id);
       $UpdateProduct->category_id=$request->category_id;
       $UpdateProduct->brand_id=$request->brand_id;
       $UpdateProduct->name=$request->name;
       $UpdateProduct->short_desc=$request->short_desc;
       $UpdateProduct->long_desc=$request->long_desc;
       $UpdateProduct->price=$request->price;
       $img=$request->file('image');
       if($img){
           $imgName=date('YmdHi').$img->getClientOriginalName();
           $img->move('public/upload/user_images/',$imgName);
           $UpdateProduct['image']=$imgName;
       }
        if($UpdateProduct->save()){
            $files=$request->sub_image;
            if(!empty($files)){
                foreach($files as $file){
                    $imgName=date('YmdHi').$img->getClientOriginalName();
                    $file->move('public/upload/user_images/product_sub_images',$imgName);
                    $subimage['sub_image']=$imgName;
                    $subimage=new ProductSubImage();
                    $subimage->product_id=$UpdateProduct->id;
                    $subimage->sub_image=$imgName;
                    $subimage->save();
                }
            }
            $colors=$request->color_id;
            if(!empty($colors)){
                foreach($colors as $color){
                    $myColor=new ProductColor();
                    $myColor->product_id=$UpdateProduct->id;
                    $myColor->color_id=$color;
                    $myColor->save();
                }
            }
            $sizes=$request->size_id;
            if(!empty($sizes)){
                foreach($sizes as $size){
                    $mySize=new ProductSize();
                    $mySize->product_id=$UpdateProduct->id;
                    $mySize->size_id=$size;
                    $mySize->save();
                }
            }
       }else{
           return redirect()->back()->with('error','Data Not Update');
       }

       Session::flash('success','Product Updated successfully');
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

