<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Illuminate\Database\Eloquent\Collection;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

use Notification;
use PDF;

class AdminController extends Controller
{
    public function view_category(){
        if(empty(Auth::user()) or Auth::user()->usertype != 1 ){
            return view('home.userpage');
        }
        
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function view_brand(){
        if(empty(Auth::user()) or Auth::user()->usertype != 1 ){
            return view('home.userpage');
        }
        $data = brand::all();
        $catagory = category::all();
        return view('admin.brand', compact('data', 'catagory'));
    }


    public function add_category(Request $request){
        
        $data = $request -> validate([
            'catagory_id' => 'required|unique:categories|max:255',
            'catagory_name' => 'required|unique:categories|max:255',
            'catagory_des' => 'required'
        ], [
            'catagory_id.unique' => 'Mã danh mục không được trùng nhau.',
            'catagory_name.unique' => 'Tên danh mục không được trùng nhau.',
            'catagory_des.required' => 'Vui lòng điền mô tả danh mục.',
            'catagory_id.required' => 'Vui lòng điền mã danh mục.',
            'catagory_name.required' => 'Vui lòng điền tên danh mục.'
        ]);
       
        $catego = new category();

        $catego->catagory_id = $request->catagory_id;
        $catego->catagory_name = $request->catagory_name;
        $catego->catagory_des = $request->catagory_des;
        $catego-> save();

        return redirect()->back()->with('message', 'Thêm thành công danh mục!');
               
    }

    public function add_brand(Request $request){

        $data = $request -> validate([
            'brands_id' => 'required|unique:brands|max:255',
            'brands_name' => 'required|unique:brands|max:255',
            'category' => 'required'
        ], [
            'brands_id.unique' => 'Mã thương hiệu không được trùng nhau.',
            'brands_name.unique' => 'Tên thương hiệu không được trùng nhau.',
            'category.required' => 'Vui lòng điền mô tả thương hiệu.',
            'brands_id.required' => 'Vui lòng điền mã thương hiệu.',
            'brands_name.required' => 'Vui lòng điền tên thương hiệu.'
        ]);
       
        $brand = new brand();

        $brand->brands_id = $request->brands_id;
        $brand->brands_name = $request->brands_name;
        $brand->category = $request->category;
        $brand-> save();

        return redirect()->back()->with('message', 'Thêm thành công danh mục!');
               
    }

    public function delete_catagory($catagory_id){

        $data = category::where('catagory_id', $catagory_id);
        $data->delete();
        
        return redirect()->back()->with('message', 'Đã xóa mục  thành công!');
               
    }

    public function delete_brand($brands_id){

        $data = brand::where('brands_id', $brands_id);
        $data->delete();
        
        return redirect()->back()->with('message', 'Đã xóa mục  thành công!');
               
    }

    public function view_product(){
        if(empty(Auth::user()) or Auth::user()->usertype != 1 ){
            return view('home.userpage');
        }
        $catagory = category::all();
        $data['catagory'] = $catagory;
        return view('admin.product', $data);
    }

    public function fetchBrand($catagory_name = null){
        $brands = brand::where('category', $catagory_name)->get();
        return response()->json([
            'status' => 1,
            'brands' => $brands
        ]);
        
    }
    
    public function add_product(Request $request){

        $func = $request -> validate([
            'product_id' => 'required|unique:products|max:255',
            'name' => 'required|unique:products|max:255',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'discount_price' => 'required'
        ], [
            'product_id.unique' => 'Mã sản phẩm không được trùng nhau.',
            'name.unique' => 'Tên sản phẩm không được trùng nhau.',
            'description.required' => 'Vui lòng không để trống mô tả sản phẩm.',
            'image.required' => 'Vui lòng không để trống hình ảnh sản phẩm.',
            'category.required' => 'Vui lòng không để trống danh mục sản phẩm.',
            'brand.required' => 'Vui lòng không để trống thương hiệu sản phẩm.',
            'quantity.required' => 'Vui lòng không để trống số lượng sản phẩm.',
            'price.required' => 'Vui lòng không để trống giá sản phẩm.',
            'discount_price.required' => 'Vui lòng không để trống giá ưu đãi của sản phẩm.',
            'product_id.required' => 'Vui lòng không để trống mã sản phẩm.',
            'name.required' => 'Vui lòng không để trống tên sản phẩm.'
        ]);

        $product = new product();

        $product->product_id = $request->product_id;
        $product->name = $request->name;
        $product->description = $request->description;
        
        $image = $request->image;
        $imagename = $request->product_id . time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        
        $product->image=$imagename;
        
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $product->save();

        return redirect()->back()->with('message_product', 'Thêm thành công sản phẩm!');
    }

    public function show_product(){
        if(empty(Auth::user()) or Auth::user()->usertype != 1 ){
            return view('home.userpage');
        }
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($product_id){
        $product = product::where('product_id', $product_id);
        $product->delete();
        
        return redirect()->back()->with('message', 'Đã xóa mục thành công!');
    }

    public function update_product($product_id){

        $product = product::where('product_id', $product_id)->first();
        $catagory = category::all();
        return view('admin.update_product', compact('product', 'catagory'));
    }

    public function update_product_confirm(Request $request, $product_id){
        
        $product = product::where('product_id', $product_id)->limit(1)->update(array('name' => $request->name));
        $product = product::where('product_id', $product_id)->limit(1)->update(array('description' => $request->description));
       
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product = product::where('product_id', $product_id)->limit(1)->update(array('image' => $imagename));
        }

        if($request->category){
            $product = product::where('product_id', $product_id)->limit(1)->update(array('category' => $request->category));
        }
        if($request->brand){
            $product = product::where('product_id', $product_id)->limit(1)->update(array('brand' => $request->brand));
        }
        $product = product::where('product_id', $product_id)->limit(1)->update(array('quantity' => $request->quantity));
        $product = product::where('product_id', $product_id)->limit(1)->update(array('price' => $request->price));
        $product = product::where('product_id', $product_id)->limit(1)->update(array('discount_price' => $request->discount_price));


        $product = product::all();
        return redirect()->back()->with('message_product', 'Đã cập nhật thành công!');
        
       
    }

    public function order(){
        if(empty(Auth::user()) or Auth::user()->usertype != 1 ){
            return view('home.userpage');
        }
        $order=order::all()->sortByDesc('created_at');
        return view('admin.order', compact('order'));
    }

    public function delivered($id){
        
        $order=order::find($id);
        $product = product::where('product_id', $order->product_id)->first();
        if($product->quantity < $order->quantity){
            return redirect()->back()->with('message_error', 'Hết hàng, vui lòng báo cáo lại kho!');
        }
        $quantity = $product->quantity - $order->quantity;
        $product = product::where('product_id', $order->product_id)->limit(1)->update(array('quantity' => $quantity));
        $order->delivery_status="Chuyển tới kho";
        $order->save();
        
        return redirect()->back();
        
    }

    public function delivered_acp($id){
        
        $order=order::find($id);
        $order->delivery_status="Đã giao, hoàn thành đơn hàng!";
        $order->save();
        
        return redirect()->back();
        
    }

    public function print_pdf($id){
        

        $order=order::find($id);
        
        $pdf=PDF::loadView('admin.PDF', compact('order'));
        
        return $pdf->download('order_details.pdf');
        
    }

    public function send_email($id){
        $order=order::find($id);
        return view('admin.mail_infor', compact('order'));
    }

    
    public function send_user_email(Request $request, $id){
        
        $order=order::find($id);
        
        $details = [
          'greeting' => $request->greeting,
          'firstline' => $request->firstline,
          'body' => $request->body_name,
          'button' => $request->button,
          'url' => $request->url,
          'lastline' => $request->lastline,
          
        ];
        
        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back();
    }

}