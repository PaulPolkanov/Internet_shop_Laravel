<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Redirect;

    class ShopController extends Controller{
        public function cardAction(Request $request){
            $porshe_cars = ['Porsche 911 Carrera 2022', 'Porsche 911 Turbo 2021', 'Porsche 911 GT3 2020', 'Porsche 718 Cayman 2022', 'Porsche Panamera 2019', 'Porsche Cayenne 2022', ];
            $status = null;
            $mycars = [];
            $error = null;
            if( $request->status == 1 ){
                $status = "You card";
                foreach($request->arr_cars as $index=>$car){
                    foreach($porshe_cars as $index_p=>$porshe){
                        if($index == $index_p){
                            array_push($mycars, array($car => $porshe));
                        }
                    }
                }
            }
            if($request->status == 'err'){
                $error = 'Please, choose a car!!!';
            }
            return view('pages.shop', compact('porshe_cars', 'status', 'mycars', 'error'));
        } 
        public function shopAction(Request $request){
            if(count($request->input()) < 2 ){
                return Redirect::route('card', ['status' => 'err']);
            }
            $choos_cars = [];
            $counter = 0;
            foreach($request->input() as $index=>$value){
                $choos_cars[$counter] = $index;
                $counter++;
            }
            array_shift($choos_cars);
            return Redirect::route('card', ['status' => 1, 'arr_cars' => $choos_cars]);
        }  
   }