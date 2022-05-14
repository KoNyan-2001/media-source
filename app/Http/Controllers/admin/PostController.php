<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
         return view('admin.post.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'content' => 'required',
        ]);
        $image = $request->image;
        $imageName = uniqid().'_'.$image->getClientOriginalName();
        $image -> storeAs('public/post_images', $imageName);

        Post::create([
        'title' => $request->title,
        'category_id' => $request->category_id,
        'image' => $imageName,
        'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('ssMsg', 'You have successfully created!');
      
                       
       
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
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
        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'content' => 'required',
        ]);
        $post = Post::findOrFail($id);
        if($request->hasFile('image')){
            $postImage = $post->image;
            File::delete('storage/post_images/'.$postImage);

        $image = $request->image;
        $imageName = uniqid().'_'.$image->getClientOriginalName();

        $image -> storeAs('public/post_images', $imageName);

       $data['image'] = $imagename;
        }
        $post->update($data);
        return redirect()->route('posts.index')->with('ssMsg', 'You have been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $postImage = $post->image;
        File::delete('storage/post_images/'.$postImage);
        $post->delete();
        return redirect()->route('posts.index')->with('ssMsg', 'You have been successfully deleted!');
    }
}