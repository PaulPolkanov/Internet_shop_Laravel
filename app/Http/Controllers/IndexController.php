<?php 
    namespace App\Http\Controllers;

use App\Helpers\CheckForExisisting;
use App\Helpers\SessionCard;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Http\Validators\CardValidator;
use App\Mail\Mailer;
use App\Models\Category;
use App\Models\Product;
use App\Models\CharacteristicProduct;
use App\Models\Page;
use App\Models\User;
use Faker\Guesser\Name;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Redirect;
  //  use App\Providers\SearchServiceProvider;
    use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use App\Providers\MainmenuServiceProvider;
   use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

    class IndexController extends Controller{
        private $template = 'default';
        public function indexAction(){
            $tamplate = $this->template;



            $category = Category::get();
            $page = Page::where(['aliase' => 'home'])->first();
            // $data = new PageResource(Page::where(['aliase' => 'home'])->first());
            // dd($data);
            
            //$service = new SearchServiceProvider;
            return view('pages.index', compact('tamplate', 'page'));
        }
        public function categoryAction($id){
            $tamplate = $this->template;
           // $products = Product::get();'
            $page = Page::where(['aliase' => 'category'])->first();
            $category = Category::where(['id' =>$id])->first();
            //dd($products);
            if(!$category){
                return abort(404);
            }
            return view('pages.category', compact('tamplate', 'page', 'category'));
        }
        public function searchAction(){
            $tamplate = $this->template;
            return view('pages.rezsearch', compact('tamplate'));
        }
        public function productAction($id){
            $tamplate = $this->template;
            $product = Product::where(['id' =>$id])->first();
            $characteristicProduct = CharacteristicProduct::where(['id_product' => $id])->get();
            $arrCharacts =[];
            foreach($characteristicProduct as $item){
                array_push($arrCharacts, $item->characteristic->name);
            }
            $setCharacts = array_unique($arrCharacts);
            //dd($characteristicProduct);
            //dd($setCharacts);
            $page = Page::where(['aliase' => 'product'])->first();
            //dd($products);
            if(!$product){
                return abort(404);
            }
            return view('pages.product', compact('tamplate', 'page', 'product', 'characteristicProduct', 'setCharacts'));
        }
        public function mailerAction(Request $request){
            $request->name;
            $request->msg;

           Mail::to('ipoletuev@mail.ru')->send(new Mailer($request->name, $request->msg));
        }
        public function formAction(){
            return view('pages.form');
        }
        public function addUserAction(Request $request){
            $status = User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make('sun'), 'id_role' => 1,]);
            if ($status) {
                return ['status' => 'ok'];
            } else {
                return ['status' => 'error'];
            }
            
        }
        public function addCardAction(Request $request){
            $validator = CardValidator::cardAdd($request);
            if($validator->fails() && CheckForExisisting::product($request->id_product)){
               // dd('here');
                return redirect()->back();
            }
            //djhfhfjfdj
            SessionCard::addProduct($request->id_product);
            return redirect()->route('card');
        }
        public function cardAction(){
            $tamplate = $this->template;
            Session::get('products');
            $products = null;
            if(Session::get('products') != null){
                $products_id = Session::get('products');
                $products = Product::whereIn('id', $products_id)->get();
            }
            $page = Page::where(['aliase' => 'card'])->first();
            return view('pages.card', compact('tamplate', 'page', 'products'));
        }
        // public function modeShowProductAction($status){
            
        //     return redirect()->back();
        // }































        // public function mainAction(Request $request){
        //     $tamplate = 'default';
        //     $page = "contacts";
        //     $a = "+7 920 00-180-52"; 
        //     $fruits = ['apple', 'tangerin', 'pear'];
        //     $status = null;
        //     if( $request->status == 1){
        //         $status = "Mail sent";
        //     }
        //     return view('pages.contacts', compact('page', 'a', 'status', 'fruits', 'tamplate'));
        // }
        // public function obrAction(Request $request){
        //     //dd($request);
        //     //return view('pages.contacts', compact('page', 'a'));
        //     return Redirect::route('contacts', ['status' => 1]);
        // }
    }