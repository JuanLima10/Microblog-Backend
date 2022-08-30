<?php

namespace App\Http\Controllers;

use App\Models\Blog as Blog;
use App\Http\Resources\Blog as BlogResource;
use Illuminate\Http\Request;

class BlogController extends Controller{
    
    public function index(){
        $blogs = Blog::paginate(15);
        return BlogResource::collection($blogs);
      }
    
      public function show($id){
        $blog = Blog::findOrFail( $id );
        return new BlogResource( $blog );
      }
    
      public function store(Request $request){
        $blog = new Blog;
        $blog->name = $request->input('name');
        $blog->text = $request->input('text');
    
        if( $blog->save() ){
          return new BlogResource( $blog );
        }
      }
    
       public function update(Request $request){
        $blog = Blog::findOrFail( $request->id );
        $blog->name = $request->input('name');
        $blog->text = $request->input('text');
    
        if( $blog->save() ){
          return new BlogResource( $blog );
        }
      } 
    
      public function destroy($id){
        $blog = Blog::findOrFail( $id );
        if( $blog->delete() ){
          return new BlogResource( $blog );
        }
    
      }
}
