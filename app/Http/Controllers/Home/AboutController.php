<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Models\MultiImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class AboutController extends Controller
{
    public function About()
    {
        $aboutslide = About::find(1);
        return view('admin.about_slide.about_slide_all', compact('aboutslide'));
    }

    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;
        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(523, 605)->save('upload/about_image/' . $name_gen);

            $save_url = 'upload/about_image/' . $name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'About Slide updated with image successfully',
                'alert-type' => 'success'
            );


            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,

            ]);
            $notification = array(
                'message' => 'About Slide updated without image successfully',
                'alert-type' => 'success'
            );


            return redirect()->back()->with($notification);
        }
 
    }

    public function Aboutpage(){
        $abouthome=About::find(1);
        return view('frontend.about_home',compact('abouthome'));
    }

    public function AboutMultiimage(){
        return view('admin.about_slide.about_multiimage');
    }

    public function storeMultiImage(Request $request){
        $image = $request->file('multi_image');

        foreach($image as $multi_image){
            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(220, 220)->save('upload/multi/' . $name_gen);

            $save_url = 'upload/multi/' . $name_gen;

            MultiImage::insert([
                
                'multi_image' => $save_url,
                'created_at' => Carbon::now()

            ]);
        }
        $notification = array(
            'message' => 'Multi Image Inserted Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.multi.image')->with($notification);
    }

    public function AllMultiimage(){
        $allMultiImage=MultiImage::all();
        return view('admin.about_slide.all_multiimage', compact('allMultiImage'));
    }

    public function UpdateMultiimage($id){
        $multiImage=MultiImage::findOrFail($id);

        return view('admin.about_slide.updat_multiimage',compact('multiImage'));
    }

    public function UpdateMultiimages(Request $request){
        $multi_image_id = $request->id;
        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(220, 220)->save('upload/multi/' . $name_gen);

            $save_url = 'upload/multi/' . $name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'Multi Image updated  successfully',
                'alert-type' => 'success'
            );


            return redirect()->route('all.multi.image')->with($notification);
        }


            
        
    }

    public function DeleteMultiimage($id){
        $multi=MultiImage::findOrFail($id);
        $img=$multi->multi_image;
        unlink($img);

        $multi=MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Multi Image Deleted  successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);

    }
}
