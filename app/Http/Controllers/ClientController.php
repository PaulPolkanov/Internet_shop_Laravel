<?php

namespace App\Http\Controllers;

use App\Helpers\CheckForExisisting;
use App\Http\Validators\LoginValidator;
use App\Jobs\AuthAlert;
use App\Models\Order;
use App\Models\Order_Product;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    private $template = 'default';
    public function createOrderAction(Request $request){
        $products_id = Session::get('products');
        CheckForExisisting::products($products_id);
        //dd(123);\
        $order = new Order;
        $order->id_user = null;
        $order->save();

        foreach($products_id as $product_id){
            $orderProduct = new Order_Product;
            $orderProduct->id_order = $order->id;
            $orderProduct->id_product = $product_id;
            $orderProduct->count = 1;
            $orderProduct->save();
        }
        Session::forget('products');
        Session::put('order', $order->id);
        return redirect()->route('check');

    }
    public function checkoutAction(){
        $tamplate = $this->template;
        $page = Page::where(['aliase' => 'checkout'])->first();
        return view('pages.checkout', compact('tamplate', 'page'));
    }
    public function loginAction(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:2',
            'email' => 'required|email:rfc,dns'
        ]);
        if($validator->fails()){
            //dd('here');
            return redirect()->back();
        }
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,])){
            return redirect()->route('lk');
        }
        else{
            return redirect()->back();
        }
    }
    public function logoutAction(){
        
    }
    public function IndexAction(){
        $tamplate = $this->template;
        $page = Page::where(['aliase' => 'Profil'])->first();
        return view('pages.cabinet.lk', compact('tamplate', 'page'));
    }
}
