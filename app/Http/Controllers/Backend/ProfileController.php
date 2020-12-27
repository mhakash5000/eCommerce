<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class ProfileController extends Controller
{


    //User Management functions here.................
    public function index()
    {
        $id=Auth()->id();
        $user=User::find($id);
        return view('Backend.profile.user-profile',compact('user'));
    }
    public function edit()
    {
        $id=Auth()->id();
        $editData=User::find($id);
        return view('Backend.profile.edit-profile',compact('editData'));

    }
    public function update(Request $request)
    {
        $update=User::find(Auth()->id());
        $update->role=$request->role;
        $update->name=$request->name;
        $update->phone=$request->phone;
        $update->email=$request->email;
        if($request->hasFile('image')){
            $filename=($request->image->getClientOriginalName());
            $request->image->storeAs('images',$filename,'public');
            User::find(1)->update(['image'=>$filename]);
        }
        $update->save();
       Session::flash('success','User Updated Successfully');
       return redirect()->back();
    }

    //password change function here.....................
    public function ChangePassword(){

        return view('backend.user.change-password');

    }
    public function UpdatePassword(Request $request){
        if(Auth::attempt(['id'=>Auth()->id(),'password'=>$request->current_password])){
            $userPass=User::find(Auth()->id());
            $userPass->password=bcrypt($request->new_password);
            $userPass->save();
            Session::flash('success','Password Change Successfully');
            return redirect()->back();
        }else{
            Session::flash('error','Wrong Password!Please Enter the Correct Password');
            return redirect()->back();
        }

    }
}
