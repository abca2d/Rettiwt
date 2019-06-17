<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Validator;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        return response($posts, 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'message'   => 'Validation Failed',
                'errors'    => $validator->errors()->all()
                ]);
        }

        $posts = new Posts();
        $posts->fill($request->all());
        $posts->save();

        return response($posts, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);

        if(!$posts){
            return response(array('message' => 'Record not found.'.$id), 404);
        }

        return response($posts, 200);
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
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'message'   => 'Validation Failed',
                'errors'    => $validator->errors()->all()
                ]);
        }

        $posts = Posts::find($id);

        if(!$posts){
            return response(array('message' => 'Record not found.'), 404);
        }

        $posts->fill($request->all());
        $posts->save();

        return response($posts, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::find($id);

        if(!$posts){
            return response(array('message' => 'Record not found.'), 404);
        }

        $posts->delete();

        return response(array('message' => 'Record was deleted.'), 200);
    }
}
