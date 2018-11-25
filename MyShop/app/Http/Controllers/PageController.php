<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Product_type;
use App\Cart;
use Session;
use App\User;
use Hash;
use Auth;
// use validate;

class PageController extends Controller
{

    public function getIndex(){
    	$slide=Slide::all();//Lấy dự liệu ảnh trong database
    	//return view('page.trangchu',['slide'=> $slide]);
    	$new_product = Product::where('new',1)->paginate(4);//Lấy tất cả cách gái trị có cột new =1;
    	$sale_product = Product::where('promotion_price','<>',0)->paginate(4);
    	return view('page.trangchu',compact('slide','new_product','sale_product'));//Truyền sang view
    }
    public function getLoaisp($ty){
        $sp_theoloai = Product::where('id_type',$ty)-> get();//Lấy tất cả các product trong database
    	$sp_khac=Product::where('id_type','<>',$ty)->paginate(3);
        $type_product=Product_type::all();
        return view('page.loai_san_pham',compact('sp_theoloai','sp_khac','type_product'));
    }
    public function getProductDetail(Request $req){
        $sanpham=Product::where('id',$req -> id)->first();//Vì mỗi sp chỉ có 1 id duy nhất
        $sp_goiy=Product::where('id','<>',$req-> id)->paginate(3);
        $sp_moi=Product::where('new',1)->paginate(3);
    	return view('page.chitiet_sanpham',compact('sanpham','sp_goiy','sp_moi'));
    }
    public function getContact(){
    	return view('page.lienhe');
    }
     public function getIntroduction(){
    	return view('page.gioithieu');
    }
    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getLogin(){
        return view('page.dangnhap');
    }
    public function getSigup(){
        return view('page.dangky');
    }
    public function postSigup(Request $req){
        //Kiểm tra người dùng nhập
        $this->validate($req, //@req để lấy các trường dưới đây
            [
                //Kiểm tra yêu cầu
                'email'=> 'required|email|unique:users,email', //Email bắt buộc người dùng nhập 'required' theo đúng định dạng email
                'password'=>'required|min:6',
                'fullname'=>'required',
                're_password'=>'required|same:password',
                'phone'=>'required',
                'address'=>'required'
            ],
            [
                'email.required'=>'Vui lòng nhập email!',
                'email.email'=>'Không đúng định dạng email!',
                'email.unique'=>'Email đã có người sử dụng!',
                'password.required'=>'Nhập password!',
                're_password.same'=>'Mật khẩu không giống nhau!',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự!',
                'address.required'=>'Nhập địa chỉ'
            ]
        );
       $user= new User();//Tạo mới 1 dữ liệu user. Lấy dữ liệu từ input đổ vào database
       $user->full_name=$req -> fullname;
       $user->email=$req -> email;
       $user->password=Hash::make($req -> password);
       $user->phone=$req -> phone;
       $user->address=$req -> address;
       $user->save();
       return redirect()->back()->with('thanhcong','Tạo tài khoản thành công!');
    }
    public function postLogin(Request $req){
        //Kiểm tra người dùng nhập
        $this -> validate($req,
        [
            'email'=> 'required|email',
            'password'=>'required|min:6'
        ],
        [
            'email.required'=> 'Vui lòng nhập email!',
            'email.email'=> 'Không đúng định dạng!',
            'password.required'=>'Vui lòng nhập mật khẩu!',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự!'
        ]);
        $credentials = array('email'=> $req->email, 'password'=>$req->password);//lấy ra mảng gồm email, password
        //Dùng lớp Auth::attempt để kiểm tra tính xác thực trong User
        if(Auth::attempt($credentials)){

            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công!']);
        }
        else{ return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công!']);}
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
}
