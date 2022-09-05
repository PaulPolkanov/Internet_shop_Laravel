<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Administrator'
            ],
            [
                'id' => 2,
                'name' => 'User'
            ],
            [
                'id' => 3,
                'name' => 'Manager'
            ],

        ]);
    }
}