<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $nameData =['HP probook', 'Acer Aspire', 'Apple iphone', 'Asus rog Phone', 'Samsung z fold', 'Samsung z fold 2', 'Huiwea nova 9se'];
        $category_idData = [2, 2, 3, 3, 3, 3, 3, 3];
        $priceData = [300, 200, 1300, 1350, 1400, 1000, 400];
        $oldPriceData = [null, 350, null, null, null, null, null];
        
        for($i=0; $i < 7; $i++) {
            $randArr = [
                'name' => $nameData[$i],
                'category_id' => $category_idData[$i],
                'price' =>$priceData[$i],
                'old_price' =>$oldPriceData[$i]];
                array_push($data, $randArr);
        }
        
        DB::table('products')->insertOrIgnore($data);
    }
}