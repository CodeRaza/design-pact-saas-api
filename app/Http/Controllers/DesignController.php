<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [
            "status" => 200,
            "response" => Design::paginate(30),
            "message" => "The List of All Designs"
        ];
        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request, Design $design)
    {
        $design = $design->newQuery();

        $design->where('title', $request->title)
            ->orWhere('slug', $request->slug)
            ->orWhere('author', $request->author)
            ->orWhere('publish', $request->publish)
            ->orWhere('meta_key', $request->meta_key)
            ->orWhere('meta_value', $request->meta_value);

        if ($request->has('size')) {
            $design->orWhereIn('size', $request->size)->get();
        }

        if ($request->has('color')) {
            $design->orWhereIn('color', $request->color)->get();
        }

        if ($request->has('category')) {
            $design->orWhereIn('category', $request->category)->get();
        }

        $data = $design->get();
    
        $response = [
            "status" => 200,
            "response" => array('data' => $data),
            "message" => "The List of All Filtered Designs"
        ];
        return $response;


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = [
            "status" => 200,
            "response" => array( "data" => Design::create($request->all())),
            "message" => "The Design is created!"
        ];
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = [
            "status" => 200,
            "response" => array("data" => Design::find($id)),
            "message" => "The Singal Design!"
        ];
        return $response;
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
        $sneaker = Design::find($id);
        $sneaker->update($request->all());

        $response = [
            "status" => 200,
            "response" => array("data" => $sneaker),
            "message" => "The Singal Design Updated!"
        ];
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Design::destroy($id);
    }
}
