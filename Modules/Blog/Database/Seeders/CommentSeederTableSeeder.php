<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CommentSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('comments')->delete();
        \DB::table('comments')->insert([
            ["id"=>1 , "content"=>"hello 1", "image"=>"no-img.jpg", "parent_id"=>0, "post_id"=>1],
            ["id"=>2 , "content"=>"hello 2", "image"=>"no-img.jpg", "parent_id"=>1, "post_id"=>1],
            ["id"=>3 , "content"=>"hello 3", "image"=>"no-img.jpg", "parent_id"=>1, "post_id"=>1],
            ["id"=>4 , "content"=>"hello 4", "image"=>"no-img.jpg", "parent_id"=>0, "post_id"=>1],
            ["id"=>5 , "content"=>"hello 5", "image"=>"no-img.jpg", "parent_id"=>4, "post_id"=>1],
            ["id"=>6 , "content"=>"hello 6", "image"=>"no-img.jpg", "parent_id"=>4, "post_id"=>1],
            ["id"=>7 , "content"=>"hello 7", "image"=>"no-img.jpg", "parent_id"=>9, "post_id"=>1],
            ["id"=>8 , "content"=>"hello 8", "image"=>"no-img.jpg", "parent_id"=>9, "post_id"=>1],
            ["id"=>9 , "content"=>"hello 9", "image"=>"no-img.jpg", "parent_id"=>0, "post_id"=>1],
            ["id"=>10 , "content"=>"hello 10", "image"=>"no-img.jpg", "parent_id"=>0, "post_id"=>1],
            ["id"=>11, "content"=>"hello 11", "image"=>"no-img.jpg", "parent_id"=>10, "post_id"=>1],
            ["id"=>12 , "content"=>"hello 12", "image"=>"no-img.jpg", "parent_id"=>0, "post_id"=>1],

        ]);
    }
}
