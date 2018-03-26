<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Photo;
use App\User;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     { $this->middleware('both', ['only' => ['create', 'store', 'edit', 'update']]);
       $this->middleware('admin', ['only' => ['publish', 'destroy', 'bin', 'destroyBlog', 'restore']]);
     }

    // public function index()
    // {
    //
    //     $blogs = Blog::where('status', 0)->latest()->paginate(2);
    //
    // }

    public function index(Request $request)
    {
      $blogs = Blog::where(function($query) use ($request){
        if (($term = $request->get('term'))){
          $query->orWhere('title', 'like', '%' .$term. '%');
        }
      })
      ->orderBy("id", "desc")
      ->paginate(2);

      return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         $rules =[
           'title' => ['required', 'min:20', 'max:200', 'unique:blogs'],
           'body' => ['required', 'min:200'],
           'photo_id' => ['mimes:jpeg, jpg, png', 'max:1000'],
         ];

         $message = [
           'photo_id.max' => 'Sorry!, your image size is too large',
           'title.max' => 'Your title should not exceed 200 characters',
         ];
         $this->validate($request, $rules, $message);
         $input = $request->all();
         $input['slug'] = str_slug($request->title);
         $input['user_id'] = Auth::user()->id;
         $input['meta_title'] = $request->title;
         if ($file = $request->file('photo_id')) {
             // $name = Carbon::now(). '.' .$file->getClientOriginalName();
             $name = time(). '.' .$file->getClientOriginalName();
             $file->move('images', $name);
             $photo = Photo::create(['photo' => $name, 'title' => $name]);
             $input['photo_id'] = $photo->id;
         }
         $blog = Blog::create($input);
         if ($categoryIds = $request->category_id) {
             $blog->category()->sync($categoryIds);
         }

         $users = User::where('get_email', 1)->get();
         foreach ($users as $user) {
           Mail::send('emails.newblog', ['blog' => $blog, 'user' => $user], function($message) use ($user){
             $message->to($user->email)->from('pratikshya@sandbox05f0927119464c278fc0e6a67fe5b130.mailgun.org', 'Pratikshya')->subject('A new blog has been posted in Projecto');
           });
         }

         notify()->flash('<h2>You have successfully created a Blog</h2>', 'success');
         return redirect('blog');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)->first();

        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $categories = Category::pluck('name', 'id');

        $blog = Blog::findOrFail($id);

        return view('blog.edit', compact('blog', 'categories'));
    }

    public function publish(Request $request, $id)
    {   $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);
        return redirect('admin');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $rules =[
        'title' => ['required', 'min:20', 'max:200'],
        'body' => ['required', 'min:200'],
        'photo_id' => ['mimes:jpeg, jpg, png', 'max:1000'],
      ];

      $message = [
        'photo_id.max' => 'Sorry!, your image size is too large',
        'title.max' => 'Your title should not exceed 200 characters',
      ];
      $this->validate($request, $rules, $message);


        $input = $request->all();
        $blog = Blog::findOrFail($id);
        if ($file = $request->file('photo_id')) {

          if($blog->photo){
            unlink('images/' . $blog->photo->photo);
            $blog->photo()->delete('photo');
          }
            // $name = Carbon::now(). '.' .$file->getClientOriginalName();
            $name = time(). '.' .$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['photo' => $name, 'title' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $blog->update($input);
        if ($categoryIds = $request->category_id) {
          $blog->category()->sync($categoryIds);
        }

        notify()->flash('<h2>You have successfully edited a Blog</h2>', 'success');
        return view('blog.show', compact('blog'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $categoryIds = $request->category_id;
        $blog->category()->detach($categoryIds);
        $blog->delete($request->all());
        return redirect('/blog/bin');
    }

    public function bin()
    {
      $deletedBlogs = Blog::onlyTrashed()->get();
      return view('blog.bin', compact('deletedBlogs'));
    }

    public function restore($id)
    {
      $restoredBlogs = Blog::onlyTrashed()->findOrFail($id);
      $restoredBlogs->restore($restoredBlogs);
      return redirect('/blog');
    }
    public function destroyBlog($id)
    {
      $destroyBlog = Blog::onlyTrashed()->findOrFail($id);
      if($destroyBlog->photo){
        unlink('images/' . $destroyBlog->photo->photo);
        $destroyBlog->photo()->delete('photo');
      }
      $destroyBlog->forceDelete($destroyBlog);
      return back();
    }
}
