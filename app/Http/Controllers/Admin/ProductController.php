<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use Validator;
use DataTables;

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

    public function productTable(Request $request){
     if($request->ajax())
     {
        $data = product::all();
        return DataTables::of($data)
        ->addColumn('photo', function ($data) { 
            $url= asset('uploads/vegeFoodsPhoto/'.$data->photo);
            return '<img src="'.$url.'" border="0" width="200" class="img-rounded" align="center" />';
        })
        ->addColumn('action', function($data){
            $button = '<a href="'.route('adminProducts.edit', $data->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
            // $button .= '&nbsp;&nbsp;&nbsp;<a href="javascript::void(0)" onclick="$(this).parent().find("form").submit()" class="btn btn-danger">Delete</a> <form action="'.route('adminProducts.destroy', $data->id).'" method="post">
            //                 @method("DELETE")
            //                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
            //             </form>';
            $button .= '&nbsp;&nbsp;&nbsp;<a href="'.route('productDestroy', $data->id).'" class="edit btn btn-danger btn-sm delete-confirm">Delete</a>';
            return $button;
        })
        ->rawColumns(['photo','action'])
        ->make(true);
    }

        return view('admin.productTable');
    }

    public function index(){
        $arr['allProduct'] = product::paginate(8);
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
    public function show($parameter)
    {   
        $category = ['vegetable', 'fruit', 'fruit juice', 'meat', 'bakery', 'seafood'];
        if (in_array($parameter, $category)) {
            $arr['allProduct'] = product::where('category', $parameter)->paginate(8);
            return view('admin.product', $arr); 
        }
        else{
            $arr['singleProduct'] = product::find($parameter);
            return view('admin.productSingle', $arr); 
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
        $arr['data'] = product::find($id);
        return view('admin.editProduct', $arr);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'weight' => 'required',
            // 'photo' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->all()[0])->withInput();
        }

        $product = product::find($id);
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
        return redirect()->route('productTable')->with('success', 'Product edited.');
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
        product::destroy($id);
        return redirect()->route('productTable')->with('success', "Product Deleted.");
    }
}
