<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        $notification =array( 
            'message'=>'User Logout Successfully',
            'alert-type'=>'success'
        );

        return redirect('/login')->with($notification);
    }

    public function profile(){
        $id= Auth::user()->id;
        $adminData=User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }
    
    public function dashboard()
    {
        return view('admin.index');
    }

    public function editProfile(){
        $id= Auth::user()->id;
        $adminData=User::find($id);
        return view('admin.admin_profile_edit', compact('adminData'));
    }

    public function storeProfile(Request $request){
        $id= Auth::user()->id;
        $data=User::find($id);
        
        $data->name=$request->name;
        $data->username=$request->username;
        $data->email=$request->email;


        if ($request->file('profile_image')) {

            
            $file=$request->file('profile_image');
            $filename=date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/profile_image'),$filename);
            $data['profile_image']=$filename;

            

        }
        $data->save();
        $notification =array( 
            'message'=>'Admin Profile Updated Successfully',
            'alert-type'=>'success'
        );
        
       
        return redirect()->route('admin.profile')->with($notification);
        
      

    }

    public function changePassword(){
        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData=$request->validate([
            'oldpassword'=>'required',
            'newpassword' => [
                'required',
                'different:oldpassword',
                
            ],
            'confirm_password'=>'required|same:newpassword'
        ]);


        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $users=User::find(Auth::id());
            $users->password=bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');
            session()->flash('alert-type','success'  );
            return redirect()->back();
        }
        else{
            session()->flash('message','Old Password do not match'  );
            session()->flash('alert-type','error'  );
            return redirect()->back();
        }
    }
    
}
