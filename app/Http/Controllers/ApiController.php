<?php 
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\CharacteristicProduct;
    use App\Models\Page;
    use App\Models\User;
    use App\Models\SocialNetwork;
    use Hamcrest\Core\Set;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use App\Http\Validators\CategoryValidator;
use App\Http\Validators\forgotPasswordValidator;
use App\Http\Validators\ProductValidator;
    use App\Http\Validators\LoginValidator;
    use App\Mail\AuthMail;
    use Illuminate\Support\Facades\Storage;
    use App\Models\Tag;
    use Illuminate\Support\Facades\Mail;
    //use App\Mail\ResetPassword;
    use Illuminate\Support\Facades\Hash;
    use App\Jobs\WorkTask;
    use App\Jobs\AddCategory;
    use App\Jobs\AuthAlert;
    use App\Jobs\ResetPassword;
use App\Mail\ResetPassword as MailResetPassword;

    class ApiController extends Controller{
        public function socialNetworkAction(){


            return response([ 'data' => SocialNetwork::get()]);
        }
        public function newProductsAction(Request $request){
            //return Tag::where('id', $request->tag)->first();
            $product_id = [];
            foreach(DB::table('tags_products')->where('tag_id', $request->flag)->get() as $item){
                array_push($product_id, $item->product_id);
            }
            return response([ 'data' => $product_id]);
        }
        public function loginAction(Request $request){
            $user = User::where(['email' => $request->email, 'name' => $request->name// 'password' => Hash::make($request->password)
            ])->first();
            if($user){
                $token = $user->createToken('token_lara');
                return $token->plainTextToken;
            }
            else{
                return 0;
            }
            //dd($);
            //return $user;
        }



    }
