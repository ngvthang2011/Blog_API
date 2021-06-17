<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategorySeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('categories')->delete();
        \DB::table('categories')->insert([
            ['id'=>1 , 'name'=>"category 1"],
            ['id'=>2 , 'name'=>"category 2"],
            ['id'=>3 , 'name'=>"category 3"],
            ['id'=>4 , 'name'=>"category 4"],
        ]);
    }
}
