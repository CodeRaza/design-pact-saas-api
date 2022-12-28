<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variations;

class VariationController extends Controller
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
            "response" => Variations::paginate(30),
            "message" => "The List of All Variations"
        ];
        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function filter(Request $request, Variations $variations)
    {
        $variations = $variations->newQuery();

        if ($request->has('product_type')) {
            $variations->whereIn('product_type', $request->input('product_type'))->get();
        }
    
        if ($request->has('product_color')) {
            $variations->whereIn('product_color', $request->input('product_color'))->get();
        }

        if ($request->has('product_size')) {
            $variations->whereIn('product_size', $request->input('product_size'))->get();
        }

        // $variations
        //     ->whereIn('product_type', $request->product_type)
        //     ->orWhereIn('product_color', $request->product_color)
        //     ->orWhereIn('product_size', $request->product_size);
            

        $data = $variations->get();

        $response = [
            "status" => 200,
            "response" => array('data' => $data),
            "message" => "The List of All Filtered Variations"
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
            "response" => array("data" => Variations::create($request->all())),
            "message" => "The Variation is created!"
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
            "response" => array("data" => Variations::find($id)),
            "message" => "The Singal Variation!"
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
        $sneaker = Variations::find($id);
        $sneaker->update($request->all());

        $response = [
            "status" => 200,
            "response" => array("data" => $sneaker),
            "message" => "The Singal Variation Updated!"
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
        return Variations::destroy($id);
    }
}
