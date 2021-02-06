<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Jetstream\CreateTeam;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "sa";
        //return view('admin.category');
        $datalist=DB::select('select*from categories');
        return view('admin.category',['datalist'=>$datalist]);
    }
    public function add()
    {
        $datalist=DB::table('categories')->get()->where('parent_id',0);
        return view('admin.category_add',['datalist'=>$datalist]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //verileri veri tabanına kaydetmek için
        DB::table('categories')->insert ([
            'parent_id'=>$request->input('parent_id'),
            'title'=>$request->input('title'),
            'keywords'=>$request->input('keywords'),
            'description'=>$request->input('description'),
            'slug'=>$request->input('slug'),
            'status'=>$request->input('status')
        ]);
        return redirect()->route('admin_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Category $category, $id)
    {
        //echo "edit";
        $data= Category::find($id);
        $datalist=DB::table('categories')->get()->where('parent_id',0);
        return view('admin.category_edit',['data'=>$data,'datalist'=>$datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category, $id)
    {
        $data=Category::find($id);
            $data->parent_id=$request->input('parent_id');
            $data->title=$request->input('title');
            $data->keywords=$request->input('keywords');
            $data->description=$request->input('description');
            $data->slug=$request->input('slug');
            $data->status=$request->input('status');
            $data->save();
        return redirect()->route('admin_category');
        //işlemleri yaptıktan sonra admin categoriye yönlendirilmesini sağlar
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->route('admin_category');
        //
    }
}
