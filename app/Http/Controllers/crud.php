<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\customer;
use App\Models\sale;
use Response;
use Validator;

class crud extends Controller
{
    function insert_category(Request $request){
        $cname=$request->cname;
        $c1=new category(['cat_name'=>$cname]);
        $c=$c1->save();
        if($c){
            return view('category',['msg'=>'category entered']);
        }
        else{
            return view('category',['msg'=>'error']);
        }
    }
    function cat_det(){
        $data=category::all();
        return view('category',['data'=>$data]);
    }
    function del_cat($id){
        category::find($id)->delete();
        return redirect('category');
    }
    function upd1_cat($id){
        $data=category::find($id);
        return view('update_cat',['data'=>$data]);
    }
    function upd2_cat(Request $request,$id){
        $cname=$request->cname;
        category::find($id)->update(['cat_name'=>$cname]);
        return redirect('update_cat');
    }

    function pcat(){
        $cat=category::all();
        return Response::json(array('success'=>true,'cat'=>$cat));
    }
    
    function insert_product(Request $request){
        $pname=$request->pname;
        $pprice=$request->pprice;
        $pcat=$request->category;
        $p1=new product(['product_name'=>$pname,'price'=>$pprice,'fk_cat_id'=>$pcat]);
        $p=$p1->save();
        if($p){
            return view('product',['msg'=>'product entered']);
        }
        else{
            return view('product',['msg'=>'error']);
        }
    }
    function show_prod(){
        $products=product::all();
        return view('product',['res'=>$products]);
    }
    function upd1_prod($id){
        $up1_pro=product::find($id);
        return view('update_product',['pro'=>$up1_pro]);
    }
    function upd2_prod(Request $request,$id){
        $pname=$request->pname;
        $pprice=$request->pprice;
        product::find($id)->update(['product_name'=>$pname,'price'=>$pprice]);
        return view('product');
    }
    function delete_prod($id){
        product::find($id)->delete();
        return redirect('product');
    }

    function insert_customer(Request $request){
        $cname=$request->cname;
        $dob=$request->dob;
        $email=$request->email;
        $cu1=new customer(['customer_name'=>$cname,'dob'=>$dob,'email'=>$email]);
        $cu=$cu1->save();
        if($cu){
            return view('customer',['msg'=>'customer entered']);
        }
        else{
            return view('customer',['msg'=>'error']);
        }
    }
    function show_customer(){
        $cus=customer::all();
        return view('customer',['cus'=>$cus]);
    }
    function upd1($id){
        $upd1_cust=customer::find($id);
        return view('update',['data'=>$upd1_cust]);
    }
    function upd2(Request $request,$id){
        $cname=$request->cname;
        $cdob=$request->cdob;
        $cemail=$request->cemail;
        customer::find($id)->update(['customer_name'=>$cname,'dob'=>$cdob,'email'=>$cemail]);
        return redirect('customer');
    }
    function delete_customer($id){
        customer::find($id)->delete();
        return redirect('customer');
    }

    function get_product(){
        $pro=product::all();
        return Response::json(array('success'=>true,'pro'=>$pro));
    }
    function get_customer(){
        $cus=customer::all();
        return Response::json(array('success'=>true,'cus'=>$cus));
    }
    function insert_invoice(Request $request){
        $cust=$request->cust;
        $prod=$request->prod;
        $qty=$request->qty;
        $inv1=new sale(['fk_pro_id'=>$prod,'fk_cus_id'=>$cust,'quantity'=>$qty]);
        $inv=$inv1->save();
        if($inv){
            return view('sales',['msg'=>'invoice entered']);
        }
        else{
            return view('sales',['msg'=>'error']);
        }
    }
     
    function sale_cust(){
        $sale=sale::all();
        // $bs=[];
        // foreach($sale as $s){
            $customer=customer::join('sales','sales.fk_cus_id','=','customers.id')->select('sales.id','customers.customer_name','customers.email')->orderBy('sales.id')->get();
        // }
        // $bs=$customer->toArray();
        return Response::json(array('success'=>true,'res'=>$customer));
    }

    // function cus_with_sale(){
    //     $customer=customer::all();
    //     $bs = [];
    //     foreach($customer as $cust){
    //         $sales = sale::select('*')->with('customer')->where('fk_cus_id', $cust->id)->get();
    //         if(!empty($sales->count())){     //to filter out empty array where sales didnt happen
    //             $bs[] = $sales->toArray();
    //         } 
    //     }  
    //     return Response::json(array('success'=>true,'data'=>$bs));
    // }
    
    function sale_count(){
        $customer=customer::all();
        $i = 0;
        foreach($customer as $cust){
            $sc[$i]['customer'] = customer::find($cust->id)->customer_name;
            $sc[$i]['count'] = sale::select('customer_name')->with('customer')->where('sales.fk_cus_id', $cust->id)->count();
            $i++;
        }
        // $res=[$sc,$cname];
        $res = $sc;
        return Response::json(array('success'=>true,'dat'=>$res));
    }

    function cus_no_sale(){
        $query=customer::leftJoin('sales','sales.fk_cus_id','=','customers.id')->orWhereNull('sales.fk_cus_id')->select('customers.customer_name','customers.email')->orderBy('customers.id')->get();
        return Response::json(array('success'=>true,'data'=>$query));
        // dd($query);
    }

    function pro_count(){
        $product=product::all();
        $i=0;
        foreach($product as $prod){
            $pc[$i]['product'] = product::find($prod->id)->product_name;
            $pc[$i]['count'] = sale::select('product_name')->with('product')->where('sales.fk_pro_id',$prod->id)->count();
            $i++;
        }
        $res=$pc;
        return Response::json(array('success'=>true,'res'=>$res));
    }
}


  

