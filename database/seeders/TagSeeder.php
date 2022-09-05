<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class TagSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'New'
            ],
            [
                'id' => 2,
                'name' => 'Hot'
            ],
            [
                'id' => 3,
                'name' => 'Sale'
            ],

        ]);
    }
}