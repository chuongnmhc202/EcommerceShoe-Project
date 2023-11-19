<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;


use Session;
use Stripe;


class HomeController extends Controller
{

    
    public function index(){
        $product = product::paginate(3);
        return view('home.userpage', compact('product'));
    }

    
    public function redirect(){
        $product = product::paginate(3);
        $usertype=Auth::user()->usertype;
        if($usertype == '1'){

            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();
            $total_revenue = 0;
            foreach($order as $order){
                $total_revenue = $total_revenue  +  $order->price;
            }

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue'));
        }
        else{
            $product = product::paginate(3);
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($product_id){
        $product = product::where('product_id', $product_id)->first();
        $comment=comment::where('product_id', $product_id)->get();
        $reply=reply::where('product_id', $product_id)->get();

        return view('home.product_details', compact('product', 'comment', 'reply'));    
    }

    public function add_cart(Request $request, $product_id){
        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;
            
            $product = product::where('product_id', $product_id)->first();

            $product_exist_id = cart::where('Product_id', $product_id)
                                ->where('user_id',$userid)->get('id')->first();

            if($product_exist_id!=null){
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity + $request->quantity;
                if($product->discount_price != $product->price){
                    $cart->price=$product->discount_price * $cart->quantity;
                }else{
                    $cart->price=$product->price * $cart->quantity;
                }
                $cart->save();

                return redirect()->back();
            }else{
                $cart = new cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                
                $cart->product_title=$product->name;
                if($product->discount_price != $product->price){
                    $cart->price=$product->discount_price * $request->quantity;
                }else{
                    $cart->price=$product->price * $request->quantity;
                }
                
                $cart->image=$product->image;
                $cart->Product_id=$product->product_id;
                $cart->quantity=$request->quantity;

                $cart->save();
        
                return redirect()->back();
            }
                        
        }else{
            return redirect('login');
        }
    }

    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $user=user::where('id',$id)->get();
            $cart=cart::where('user_id',$id)->get();
            return view('home.showcart', compact('cart','user', 'id'));
        }else{
            return redirect('login');
        }
        
    }

    public function remove_cart($id){
        $cart=cart::find($id);
        $cart->delete();
        
        return redirect()->back();
    }

    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;
        $code_number = $this->generateUniqueCode();
        $data=cart::where('user_id', '=',$userid)->get();
        foreach($data as $data){
            $order=new order;
            $order->order_number=$code_number;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;

            $order->payment_status='Thanh toán COD';
            $order->delivery_status='Đợi xử lý';

            $order->save();
            
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();


        }
        
        return redirect()->back()->with('messege', 'Chúng tôi đã nhận đơn hàng của bạn. Chúng ta sẽ sớm liên lạc với bạn..');
        
    }

    public function stripe($totalprice){
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
    
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice,
                "currency" => "vnd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);
        $user=Auth::user();
        $userid=$user->id;
        $code_number = $this->generateUniqueCode();
        $data=cart::where('user_id', '=',$userid)->get();
        foreach($data as $data){
            $order=new order;
            $order->order_number=$code_number;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;

            $order->payment_status='Thanh toán qua thẻ';
            $order->delivery_status='Đợi xử lý';

            $order->save();
            
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        Session::flash('success', 'Thanh toán thành công');
              
        return back();
    }


    public function show_order(){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;

            $order=order::where('user_id', '=', $userid)->get()->sortByDesc('created_at');
            return view('home.order', compact('order'));
        }else{
            return redirect('login');
        }
    }

    public function add_comment(Request $request, $id){
        if(Auth::id()){
            $product = product::where('product_id', $id)->first();

            $comment=new comment;
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;
            $comment->product_id=$product->product_id;

            $comment->save();

            return redirect()->back();
            
        }else{
            return redirect('login');
        }
        
    }

    public function add_reply(Request $request, $id){
        if(Auth::id()){
            $product = product::where('product_id', $id)->first();

            $reply=new reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->reply=$request->reply;
            $reply->comment_id=$request->commentId;
            $reply->product_id=$product->product_id;

            $reply->save();

            return redirect()->back();
            
        }else{
            return redirect('login');
        }
        
    }

    public function product_list(){
        $product = product::paginate(6);
        return view('home.product_list', compact('product'));
    }

    public function product_search(Request $request){
        $search_text=$request->search;

        $product=product::where('name','LIKE',"%$search_text%")
                    ->orWhere('brand','LIKE',"%$search_text%")
                    ->orWhere('category','LIKE',"%$search_text%")->paginate(6);
        return view('home.product_list', compact('product'));
    }

    public function generateUniqueCode(){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);

        $code = '';

        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        if (order::where('order_number', $code)->exists()) {
            $this->generateUniqueCode();
        }

        return $code;
    } 

    public function upload_infor(Request $request, $id){
        $user = user::find($id);
        $user->name = $request->name_user;
        $user->address = $request->address_user;
        $user->phone = $request->phone_user;

        $user->save();
        return redirect()->back()->with('messege', 'Cập nhật thông tin thành công!');
       
    }

}