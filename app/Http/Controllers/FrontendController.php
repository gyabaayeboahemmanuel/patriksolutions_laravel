<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Youtube;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;


class FrontendController extends Controller
{
    
    public function index(){
        $youtube = Youtube::all();
        $blogs = Blog::all();
         return view('blog.index')->with(['youtubes'=> $youtube, 'blogs'=>$blogs]);
        }

    function blogposts(){
        $blogs = Blog::all();
         return view('blog.blog-posts')->with('blogs', $blogs);
        }
    function blogdetails(int $id){

       $blog = Blog::find($id);
    
         return view('blog.blog-post-details')->with('blog', $blog);
        }
    function courses(){
         return view('blog.courses');
        }
    function aboutus(){
         return view('blog.about-us');
        }
   public function contact(){
         return view('blog.contact');
        }
   public function contactus(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        Contact::create($data);
        
        return redirect()->route('contact');
        }

}
