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
