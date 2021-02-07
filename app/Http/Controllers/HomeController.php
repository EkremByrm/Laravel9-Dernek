<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Message;
use App\Models\Product;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{

    public static function categorylist(){//tree yapısına categori content gönderme

        return Category::where('parent_id','=',0)->with("children")->get();
    }
    public static function settinglist(){
        return Setting::first();
    }
    public function index(){
        $setting=Setting::first();
        $slider=Product::select('title','id','slug','image')->limit(4)->get();
        $soneklenen=Product::first();
        $galery=Image::where("product_id",$soneklenen->id)->limit(3)->get();//slider için döngü
        $picked=Product::limit(3)->where("status","True")->inRandomOrder()->get();
        $haber=Product::limit(3)->where("status","True")->inRandomOrder()->get();
        return view("home.index",[
            'setting'=>$setting,
            'slider'=>$slider,//dinamık slıder
            'soneklenen'=>$soneklenen,
            'galery'=>$galery,
            'yardim'=>$picked,
            'haber'=>$haber,
        ]);
    }
    public function contact(){
        $setting=Setting::first();
        return view("home.contact",[
            'setting'=>$setting
        ]);
    }
    public function sendmessage(Request $request){
        $data= new Message();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->subject=$request->subject;
        $data->message=$request->message;
        $data->ip=$_SERVER["REMOTE_ADDR"];
        $data->save();
        return redirect()->route("contact")->with("success","Mesajınız Başarıyla Gönderilmistir.");
    }
    public function category_content($id){//categori için

        $datalist=Product::where("category_id",$id)->get();
        $data=Category::find($id);
        return view("home.category_content",[
            'data'=>$data,
            'datalist'=>$datalist
        ]);
    }
    public function content_detail($id){

        $data=Product::find($id);
        $galery=Image::where("product_id",$id)->get();
        $review=Review::where("product_id",$id)->where("status","True")->get();
        return view("home.content_detail",[
            'data'=>$data,
            'galery'=>$galery,
            'review'=>$review,
        ]);
    }

    public function getproduct(Request $request){
        $search=$request->search;
        $data=Product::where("title",'like','%'.$search.'%')->get()->count();
        if($data==1){
            $data=Product::where("title",'like','%'.$search.'%')->first();
            return redirect()->route("product_detail",[$data->id,$data->slug]);
        }
        else{
            return redirect()->route('productlist',[$search]);
        }
    }
    public function productlist($search){//içerik sorgu
        $datalist=Product::where("title",'like','%'.$search.'%')->get();
        if(isEmpty($datalist)){
            return view('home.content_list',[
                'datalist'=>$datalist,
                'search'=>$search
            ])->with("warning","Aramanıza uygun sonuç bulunamadı");
        }

        else{
            return view('home.content_list',[//!!!!
                'datalist'=>$datalist,
                'search'=>$search
            ]);
        }

    }

    public function aboutus(){
        $setting=Setting::first();
        return view("home.aboutus",[
            'setting'=>$setting
        ]);
    }
    public function referance(){
        $setting=Setting::first();
        return view("home.referance",[
            'setting'=>$setting
        ]);
    }
    public function faq(){
        $data=Faq::where("status",'=','True')->get();
        return view("home.faq",[
            'data'=>$data
        ]);
    }
    public function login(){//login tru sonucu gelince adminpage e yönlendirme
        return view("admin.login");

    }
    public function login_check(Request $request){//kontrol sorgusu
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('adminhome');
        }

        return back()->withErrors([//false post edilirse çalışıcak
            'email' => 'Email ve ya şifre yanlış.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
