<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Term;
use App\Attribute;
class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Term::get();
        $attributes = Attribute::get();
        return view('admin.terms.index', compact('attributes', 'terms'));
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
        $slug = $request->slug;
        $this->validate($request,[
            'attribute_id'=>'required',
            'name' => 'required',
            'slug' => 'required|unique:terms,slug,' .$slug,
        ]);
        $term = new Term();
        $term->attribute_id = $request->attribute_id; 
        $term->name = $request->name; 
        $term->slug = $request->slug; 
        $term->description = $request->description; 
        $term->save();
        return response()->json($term);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        if(Term::where('slug', $slug)->first()){
            return "Slug Existe.";
        }else{
            return "Slug Disponible.";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term = Term::find($id);
        return response()->json($term);
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
            'name' => 'required',
            'slug' => 'required|unique:terms,slug,' .$id,

        ]);
        Term::find($id)->update($request->all());
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term = Term::where('id', $id)->first();
        $term->delete();
    }
    public function getTerms(Request $request)
    {
        $terms = Term::paginate(5);
        //$terms = Attribute::with('terms')->paginate(5);
        $response = [
            'pagination' => [
                'total'         => $terms->total(),
                'current_page'  => $terms->currentPage(),
                 'per_page'     => $terms->perPage(),
                'last_page'     => $terms->lastPage(),
                'from'          => $terms->firstItem(),
                'to'            => $terms->lastItem(),
            ],
            'term' => $terms
        ];
        return response()->json($response);
    }
}
