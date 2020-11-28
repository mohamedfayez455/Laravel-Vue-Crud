<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Matching\ValidatorInterface;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function index()
    {
        return response()->json(['status' => 'success' , 'data' =>Post::all()] , 200);
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(),[
            'title'  => 'required',
            'body'  => 'required',
        ]);
        if ($data->fails()){
            return response()->json(['status' => 'error' , 'errors' =>$data->errors()] , 422);
        }
        $post = new  Post();
        $post->title  =$request->title;
        $post->body  =$request->body;

        if ($post->save()){
            return response()->json(['status' => 'success' , 'data' =>$post] , 200);
        }else{
            return response()->json(['status' => 'error' ] , 500);
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        if (empty($post)){
            return response()->json(['status' => 'error' ] , 404);
        }else{
            return response()->json(['status' => 'success' , 'data' =>$post] , 200);
        }
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (empty($post)){
            return response()->json(['status' => 'error' ] , 404);
        }
        $data = Validator::make($request->all(),[
            'title'  => 'required',
            'body'  => 'required',
        ]);
        if ($data->fails()){
            return response()->json(['status' => 'error' , 'errors' =>$data->errors()] , 422);
        }
        $post->title  =$request->title;
        $post->body  =$request->body;

        if ($post->update()){
            return response()->json(['status' => 'success' , 'data' =>$post] , 201);
        }else{
            return response()->json(['status' => 'error' ] , 500);
        }
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        if (empty($post)){
            return response()->json(['status' => 'error' , 'message' => 'the post not found' ] , 404);
        }elseif ($post->delete()){
            return response()->json(['status' => 'success' , 'data' => $post ] , 200 );
        }else{
            return response()->json(['status' => 'error' ] , 500);
        }
    }
}
