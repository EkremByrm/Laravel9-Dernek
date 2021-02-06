<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=Product::all();
        return view("admin.product",[
            'datalist'=>$datalist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_list=Category::with('children')->get();
        return view("admin.product_add",[
            "category_list"=>$category_list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Product;
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->detail=$request->detail;
        $data->status=$request->status;
        $data->slug=$request->slug;
        if($request->image){
            $data->image=Storage::putFile("images",$request->file("image"));
        }
        $data->save();
        return redirect()->route("admin_product");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $category_list=Category::with('children')->get();
        $data=Product::find($id);
        return view("admin.product_update",[
            'data'=>$data,
            'category_list'=>$category_list
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,Product $product)
    {
        $data=Product::find($id);
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->detail=$request->detail;
        $data->status=$request->status;
        $data->slug=$request->slug;
        if($request->image){
            $data->image=Storage::putFile("images",$request->file("image"));
        }
        $data->save();
        return redirect()->route("admin_product")->with("succes","Category is created");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        Product::destroy($id);
        return redirect()->route("admin_product");
    }
}
