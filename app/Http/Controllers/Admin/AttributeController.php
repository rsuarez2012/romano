<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attribute;
class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.attributes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'attribute' => 'required'
        ]);
        //$create = Attribute::create($request->all());
        $attribute = new Attribute();
        $attribute->attribute = $request->attribute;
        $attribute->save();
        return response()->json($attribute);
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($attribute)
    {
        $attr = Attribute::where('id', $attribute)->first();
        return $attr;
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
        $this->validate($request,[
            'attribute' => 'required'
        ]);
        Attribute::find($id)->update($request->all());
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($attribute)
    {
        $attr = Attribute::where('id', $attribute)->first();
        $attr->delete();
    }
    public function getAttributes(Request $request)
    {
        //$attributes = Attribute::paginate(5);
        $attributes = Attribute::with('terms')->paginate(5);
        $response = [
            'pagination' => [
                'total'         => $attributes->total(),
                'current_page'  => $attributes->currentPage(),
                 'per_page'     => $attributes->perPage(),
                'last_page'     => $attributes->lastPage(),
                'from'          => $attributes->firstItem(),
                'to'            => $attributes->lastItem(),
            ],
            'data' => $attributes
        ];
        return response()->json($response);
    }
}
