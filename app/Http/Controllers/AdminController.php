<?php 
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\CharacteristicProduct;
    use App\Models\Page;
    use App\Models\User;
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

    class AdminController extends Controller{

        private $template = 'admin';

        public function indexAction(){
            $tamplate = $this->template;
            return view('pages.admin.dashboard', compact('tamplate'));
        }
        public function loginAction(){
            $tamplate = $this->template;
            return view('pages.admin.login', compact('tamplate'));
        }
        public function authAction(Request $request){
            //dd($request);
            $validator = LoginValidator::logIn($request);
            if($validator->fails()){
                //dd('here');
                return redirect()->route('adminlogin');
            }
            if(Auth::attempt([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,])){
                AuthAlert::dispatch($request);
                return redirect()->route('dashboard');
            }
            
            return redirect()->route('adminlogin');
        }
        public function logoutAction(){
            return redirect()->route('adminlogin');
        }
        public function productsShowAction(){
            $tamplate = $this->template;
            $products = Product::paginate(20);
            $category = Category::get();

            return view('pages.admin.products', compact('tamplate', 'products', 'category'));
        }
        public function categoryShowAction(){
            //WorkTask::dispatch('Big sale');
            $tamplate = $this->template;
            $products = Product::get();
            $category = Category::paginate(7);
            return view('pages.admin.category', compact('tamplate', 'products', 'category'));
        }
        public function categoryAddAction(Request $request){
            //dd($request);
            $validator = CategoryValidator::categoryAdd($request);
            if($validator->fails()){
               // dd('here');
                return redirect()->route('adminCategory')->withErrors($validator)->with('error', 'Errors!!!')->withInput();
            }
            AddCategory::dispatch($request);
            return redirect()->route('adminCategory')->with('success', 'Ок! Категория успешно добавлен');
        }
        public function categoryDeleteAction(Request $request){
            //dd($request);
            $validator = CategoryValidator::categoryDelete($request);
            if($validator->fails()){
                return redirect()->route('adminCategory')->with('error', 'Error! Category not delete!:(');
            }
            Category::where(['id' => $request->category_id])->delete();
            return redirect()->route('adminCategory')->with('success', 'Ok! Category successful delete');
        }
        public function productAddAction(){
            $tamplate = $this->template;
            $products = Product::get();
            $category = Category::get();
            $tags = Tag::get();
            return view('pages.admin.addProduct', compact('tamplate', 'products', 'category', 'tags'));
        }
        public function categoryEditAction($id){
            $tamplate = $this->template;
            $category = Category::where(['id' =>$id])->first();
            if(!$category){
                return redirect()->route('adminCategory')->with('error', 'Error! No category!:(');
            }
            return view('pages.admin.editCategory', compact('tamplate', 'category'));
        }
        public function categoryChangeAction(Request $request){
            //dd($request);
            $validator = CategoryValidator::categoryAdd($request);
            if($validator->fails()){
                //dd('here');
                return redirect()->route('adminCategory')->withErrors($validator)->with('error', 'Errors!!!')->withInput();
            }
            Category::where('id', $request->id)->update([
                'name' => $request->name, 
                'description' => $request->description
            ]);
            return redirect()->route('adminCategory')->with('success', 'Ok! Category successful update!:)');
        }
        public function productAddPostAction(Request $request){
            $validator = ProductValidator::productAdd($request);
            if($validator->fails()){
                //dd('here');
                return redirect()->route('adminProducts')->withErrors($validator)->with('error', 'Errors!!!')->withInput();
            }
            $path = $request->img->store('/public/img');

            $product = new Product;

            $product->name = $request->name;
            $product->count = $request->count;
            $product->price = $request->price;
            $product->old_price = $request->old_price;
            $product->status = $request->status;
            //$product->img = $request->tags;
            $product->img = $request->img->hashName();
            $product->category_id = $request->category;
            $product->save();

            return redirect()->route('adminProducts')->with('success', 'Ok! Product successful add!:)');
        }
        public function forgotPassAction(){
            return view('pages.admin.forgotPassword');
        }
        public function forgotPassReqAction(Request $request){
            $validator = forgotPasswordValidator::checkMail($request);
            if($validator->fails()){
                //dd('here');
                return redirect()->route('forgotPass')->withErrors($validator)->with('error', 'Error! Enter mail again!');
            }
            $mail = trim(mb_strtolower($request->mail));
            $user = User::where('email', $mail)->first();
            if($user == null){
                return redirect()->route('forgotPass')->withErrors($validator)->with('error', 'Error! Mail not exist!');
            }
            else{

                //$userObj = new User;
                $user->token = md5($user->id."".$user->password);
                $user->update();
                ResetPassword::dispatch($user);
                return redirect()->route('forgotPass')->with('success', 'Check you mail!');
            }
            //dd('cool');
        }
        public function resPassAction($token){
            $user = User::where('token', $token)->first();
            if($user == null){
                return redirect()->route('adminlogin');
            }
            //$user->token = null;
            //$user->update();
            $id=$user->id;
            return view('pages.admin.resetPassword', compact('id'));
        }
        public function resPassReqAction(Request $request){
            //dd($request);
            //$user = User::where('id', $request->id)->first();
            $validator= forgotPasswordValidator::checkPassword($request);
            //$user->token = null;
            //$user->update();
            if($validator->fails()){
                //dd('here');
                return redirect()->route('adminlogin')->withErrors($validator)->with('error', 'Error! Reset Password Again!');
            }
            $user = User::where('id', $request->id)->first();
            $user->token = null;
            $user->password = Hash::make($request->password);
            $user->update();
            return redirect()->route('adminlogin')->with('succes', 'Password has been reset!');

        }
    }
