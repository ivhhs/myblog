<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Posts;
use App\User;
use App\Categories;
use App\PostsTags;
use Image;
use App\Comments;
use Auth;

class PostsController extends Controller
{
   
    protected $per_page = '5';

    public function getCreate()
    {
        //
        $page_title = '添加文章';

        $categories = Categories::all();
       

        $data = compact('page_title','categories');

        return view('posts.create',$data);
    }

    public function postCreate(Request $request){

        $all = $request->all();
        $validator = Validator::make($all, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required'        
        ]);
        if(isset($all['active'])){
            $all['active'] = true;
        }else{
            $all['active'] = false;
        }


        if ($validator->fails()) {
            
            $page_title = '添加文章';
            $categories = Categories::all();
           

            $data = compact('page_title','categories');
            return view('posts.create',$data)
                ->withErrors($validator->errors());
   
        }



        $user = Auth::user();
        $markdown_content = $all['descr'];
        

        $post = Posts::create([
            'title' => $all['title'],
            'content' => $all['content'],
            'markdown_content' => $markdown_content,
            'active' => $all['active'],
            'user_id' => $user->id,
            'category_id' => $all['category_id']
        ]); 

      


        return redirect(route('home'));

    }


   

    public function getPage(){

        $page_title = 'All Posts';
        $posts = Posts::where('active',1)->orderBy('updated_at', 'desc')->paginate($this->per_page);

        $data = compact('posts','page_title');
        return view('posts.page',$data);
    }


    public function getShow($id = null){

        $post = Posts::findOrFail($id);
        $page_title = $post->title;
        
        $data = compact('post','page_title');
        return view('posts.show',$data);
    }

    public function getMine(){
        $user = Auth::user();
        $posts = $user->posts()
            ->orderBy('updated_at', 'desc')
            ->paginate($this->per_page);
        $page_title = '我的文章';
        $data = compact('posts','page_title');
        return view('posts.page',$data);       
    }


    public function getUserPost($id = null){
        $user = User::findOrFail($id);
        $page_title = $user->name;
        $posts = $user->posts()
            ->where('active',1)
            ->orderBy('updated_at', 'desc')
            ->paginate($this->per_page);

        $data = compact('posts','page_title');
        return view('posts.page',$data);

    }

    public function getCategoryPost($id = null){
        $category = Categories::findOrFail($id);
        $page_title = $category->name;
        $posts = $category->posts()
            ->where('active',1)
            ->orderBy('updated_at', 'desc')
            ->paginate($this->per_page);

        $data = compact('posts','page_title');
        return view('posts.page',$data);

    }

   


    public function getUpdate(Request $request,$id = null){
        $post = Posts::findOrFail($id);

        $html_content = $post->content;
        $markdown_content = $post->markdown_content;
       
        $page_title = '编辑文章';
        $request->offsetSet('id', $post->id);
        $request->offsetSet('title', $post->title);
        $request->offsetSet('content', $html_content);
        $request->offsetSet('descr', $markdown_content);

        $request->offsetSet('active',$post->active);
        $request->offsetSet('category_id',$post->category_id);
       


        $categories = Categories::all();

        $data = compact('page_title','categories','post');

        return view('posts.edit',$data);
    }


    public function postUpdate(Request $request){
        

        $all = $request->all();
        $validator = Validator::make($all, [
            'id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required'        
        ]);   
        if(isset($all['active'])){
            $all['active'] = true;
        }else{
            $all['active'] = false;
        }

        if ($validator->fails()) {
            $page_title = '编辑文章';
            $categories = Categories::all();
           

            $data = compact('page_title','categories');
            return view('posts.edit',$data)
                ->withErrors($validator->errors());
   
        }
        $post = Posts::findOrFail($all['id']);

        $markdown_content = $all['descr'];
        $html_content = $all['content'];

        $post->title = $all['title'];
        $post->content = $html_content;
        $post->markdown_content = $markdown_content;
        $post->active = $all['active'];
        $post->category_id = $all['category_id'];

            $post->save();

        
        return redirect(route('home'));

    }


    public function getDelete($id = null){
        $post = Posts::findOrFail($id);
            $post->delete();
        return redirect(route('home'));
    }


    public function uploadPostImage(Request $request){


        if($request->hasFile('imgFile')){
            $file = $request->file('imgFile');

            $ext_array = array(
                'png',
                'jpg',
                'jpeg',
                'gif');
                
            $extension       = $file->getClientOriginalExtension();
            if(in_array($extension, $ext_array)){
                $folderName      = '/upload/images/' . date("Ym", time()) .'/'.date("d", time()) .'/'. Auth::user()->id.'/';
    
                $destinationPath = public_path() . $folderName;
                $safeName        = str_random(10).'.'.$extension;
    
                $localFullPath   = $destinationPath . $safeName;
                $httpFullPath    = url('/') . $folderName . $safeName;
    
                $file->move($destinationPath, $safeName);
    
                $img = Image::make($localFullPath);
    
                $height = $img->height();
                $width = $img->width();
    
                if($width > 900){
                    $resize_width = 900;
                    $resize_heigth = $height*900/$width;
    
                    $resize_safeName = $resize_width."X".$resize_heigth."_".$safeName;
                    $resize_localFullPath = $destinationPath.$resize_safeName;
                    $img->resize($resize_width, $resize_heigth)->save($resize_localFullPath);
    
                    $httpFullPath = url('/') . $folderName . $safeName;
    
                }

                $data['url'] = $httpFullPath;
                $data['error'] = 0;

            }else{
                $data = [
                    'error' => 1,
                    'message' => '图片格式错误',

                ];

            }

        }else{
            $data = [
                'error' => 1,
                'message' => '上传失败',

            ];

        }

        exit(json_encode($data));
    }

    function addComment(Request $request){
        $all = $request->all();
        
        $validator = Validator::make($all, [
            'comment' => 'required'
        ]); 

        if ($validator->fails()) {
            $id = $all['id'];
            $post = Posts::findOrFail($id);
            $page_title = $post->title;
            
            $data = compact('post','page_title');

            return view('posts.show',$data)
                ->withErrors($validator->errors());
   
        }  

        $comment = $all['comment'];
        $user_id = Auth::user()->id;
        $post_id = $all['id'];

        $post = Comments::create([
            'comment' => $comment,
            'post_id' => $post_id,
            'user_id' => $user_id

        ]); 


        return redirect(route('getPostShow',$post_id));


    }



}
