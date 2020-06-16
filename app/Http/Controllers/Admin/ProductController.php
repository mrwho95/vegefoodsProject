<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $arr['allProduct'] = product::all();
        return view('admin.product', $arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, product $product)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'weight' => 'required',
            'photo' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->description = $request->description;
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads/vegeFoodsPhoto/', $filename);
            $product->photo = $filename;
        }
        $product->save();
        return redirect()->route('adminProducts.index')->with('success', 'Product added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arr['singleProduct'] = product::find($id);
        return view('admin.productSingle', $arr); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
