<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sneaker;

class SneakerController extends Controller
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
            "response" => Sneaker::paginate(30),
            "message" => "The List of All Sneakers"
        ];
        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request, Sneaker $sneaker)
    {
        $sneaker = $sneaker->newQuery();

        // if ($request->has('title')) {
        //     $sneaker->where('title', $request->title)->get();
        // }

        // if ($request->has('slug')) {
        //     $sneaker->where('slug', $request->slug)->get();
        // }

        // if ($request->has('size')) {
        //     $sneaker->where('size', $request->size)->get();
        // }

        // if ($request->has('color')) {
        //     $sneaker->where('color', $request->color)->get();
        // }

        // if ($request->has('author')) {
        //     $sneaker->where('author',$request->author)->get();
        // }

        // if ($request->has('publish')) {
        //     $sneaker->where('publish', $request->publish)->get();
        // }

        // if ($request->has('category')) {
        //     $sneaker->where('category', $request->category)->get();
        // }

        // if ($request->has('discription')) {
        //     $sneaker->where('discription', $request->discription)->get();
        // }

        // if ($request->has('type')) {
        //     $sneaker->where('type', $request->type)->get();
        // }

        // if ($request->has('name')) {
        //     $sneaker->where('name', $request->name)->get();
        // }

        

        $sneaker
            ->where('title', $request->title)
            ->orWhere('slug', $request->slug)
            ->orWhere('author', $request->author)
            ->orWhere('publish', $request->publish)
            ->orWhere('description', $request->description)
            ->orWhere('type', $request->type)
            ->orWhere('name', $request->name);

        if ($request->has('size')) {
            $sneaker->orWhereIn('size', $request->size)->get();
        }

        if ($request->has('color')) {
            $sneaker->orWhereIn('color', $request->color)->get();
        }

        if ($request->has('category')) {
            $sneaker->orWhereIn('category', $request->category)->get();
        }

        $data = $sneaker->get();
        
        $response = [
            "status" => 200,
            "response" => array('data' => $data),
            "message" => "The List of All Filtered Sneakers"
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
            "response" => array("data" => Sneaker::create($request->all())),
            "message" => "The Sneakers is created!"
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
            "response" => array("data" => Sneaker::find($id)),
            "message" => "The Singal Sneakers!"
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
        $sneaker = Sneaker::find($id);
        $sneaker->update($request->all());

        $response = [
            "status" => 200,
            "response" => array("data" => $sneaker),
            "message" => "The Singal Sneakers Updated!"
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
        return Sneaker::destroy($id);
    }
}
