<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $nameData =['Smart-watch', 'tablet', 'digital camer', 'printer', 'tv', 'screen', 'washing machine', 'PC', 'video card', 'mather board', 'RAM', 'SSD', 'HDD'];
        
        for($i=0; $i < 7; $i++) {
            $randArr = [
                'name' => $nameData[$i]];
                array_push($data, $randArr);
        }
        
        DB::table('category')->insertOrIgnore($data);
    }
}