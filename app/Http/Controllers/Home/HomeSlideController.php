<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Ramsey\Uuid\Type\Hexadecimal;
use Image;
class HomeSlideController extends Controller
{
   public function HomeSlide(){
    $homeslide=HomeSlide::find(1);
    return view('admin.home_slide.home_slide_all', compact('homeslide'));
   }
   public function updateSlide(Request $request){
    $slide_id=$request->id;
    if($request->file('home_slide')){
        $image=$request->file('home_slide');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(636,852)->save('upload/slide_image/'.$name_gen);

        $save_url='upload/slide_image/'.$name_gen;

        HomeSlide::findOrFail($slide_id)->update([
            'title'=>$request->title,
            'short_title'=>$request->short_title,
            'home_slide'=>$save_url,
            'video_url'=>$request->video_url,
        ]);
        $notification =array( 
            'message'=>'Home Slide updated with image successfully',
            'alert-type'=>'success'
        );
        
       
        return redirect()->back()->with($notification);
        
    }
    else{
        HomeSlide::findOrFail($slide_id)->update([
            'title'=>$request->title,
            'short_title'=>$request->short_title,
            'video_url'=>$request->video_url,
        ]);
        $notification =array( 
            'message'=>'Home Slide updated without image successfully',
            'alert-type'=>'success'
        );
        
       
        return redirect()->back()->with($notification); 
    }
    
   }
  
}
