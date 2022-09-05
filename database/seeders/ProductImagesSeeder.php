<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $nameData =['product06.png', 'product02.png', 'product01.png', 'kxhF3z9ZpGxDhsSjU7Syun0dXBZVg8mBYis9KuPJ.jpg', 'product03.png'];
        $product_idData = [1, 2, 3, 29, 1];
        
        for($i=0; $i < count($product_idData); $i++) {
            $randArr = [
                'name' => $nameData[$i],
                'product_id' => $product_idData[$i]];
                array_push($data, $randArr);
        }
        $product_idData = [4, 5, 6, 7, 8, 9, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        for($i=0; $i < count($product_idData); $i++) {
            $randArr = [
                'name' => 'default.png',
                'product_id' => $product_idData[$i]];
                array_push($data, $randArr);
        }
        
        DB::table('product_images')->insertOrIgnore($data);
    }
}