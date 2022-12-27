<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attributes;

class AttributeController extends Controller
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
            "response" => Attributes::paginate(30),
            "message" => "The List of All Attributes"
        ];
        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request, attributes $attributes)
    {
        $attributes = $attributes->newQuery();

        if ($request->has('attribute_name')) {
           
            $attributes->where('taxonomy', 'pa_'.$request->input('attribute_name'))->get();
        
            if($request->has('search')){
                $attributes->where('slug', $request->input('search'))->get();
            }

            $data = $attributes->get();

            $response = [
                "status" => 200,
                "response" => array('data' => $data),
                "message" => "The List of All Filtered Variations"
            ];
            return $response;
        }  else {
            $response = [
                "status" => 404,
                "message" => "Please Enter attribute_name Parameters!"
            ];
            return $response;
        }
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
            "response" => array("data" => Attributes::create($request->all())),
            "message" => "The Attribute is created!"
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
            "response" => array("data" => Attributes::find($id)),
            "message" => "The Singal Attribute!"
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
        $sneaker = Attributes::find($id);
        $sneaker->update($request->all());

        $response = [
            "status" => 200,
            "response" => array("data" => $sneaker),
            "message" => "The Singal Attribute Updated!"
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
        return Attributes::destroy($id);
    }
}
