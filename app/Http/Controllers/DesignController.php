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
            "data" => Design::paginate(30),
            "message" => "The List of All Designs"
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
            "data" => Design::create($request->all()),
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
            "data" => Design::find($id),
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
            "data" => $sneaker,
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
