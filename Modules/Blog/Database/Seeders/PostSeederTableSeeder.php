<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('posts')->delete();
        \DB::table('posts')->insert([
            ['id'=>1, 'title'=> 'What is Lorem Ipsum? 1','content'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry 1', 'image'=> 'no-img.jpg', 'user_id'=> 1, 'like'=> 111, 'category_id'=> 1],
            ['id'=>2, 'title'=>'What is Lorem Ipsum? 2' ,'content'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry 2' , 'image'=> 'no-img.jpg', 'user_id'=> 1, 'like'=> 222, 'category_id'=> 2],
            ['id'=>3, 'title'=>'What is Lorem Ipsum? 3' ,'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry 3' , 'image'=> 'no-img.jpg', 'user_id'=> 2, 'like'=> 333, 'category_id'=> 1],
            ['id'=>4, 'title'=>'What is Lorem Ipsum? 4' ,'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry 4' , 'image'=> 'no-img.jpg', 'user_id'=> 2, 'like'=> 444, 'category_id'=> 2],
            ['id'=>5, 'title'=>'What is Lorem Ipsum? 5' ,'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry 5' , 'image'=> 'no-img.jpg', 'user_id'=> 2, 'like'=> 555, 'category_id'=> 3],
            ['id'=>6, 'title'=>'What is Lorem Ipsum? 6' ,'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry 6' , 'image'=> 'no-img.jpg', 'user_id'=> 3, 'like'=> 666, 'category_id'=> 1],
            ['id'=>7, 'title'=>'What is Lorem Ipsum? 7' ,'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry 7' , 'image'=> 'no-img.jpg', 'user_id'=> 3, 'like'=> 777, 'category_id'=> 4],
            ['id'=>8, 'title'=>'What is Lorem Ipsum? 8' ,'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry 8' , 'image'=> 'no-img.jpg', 'user_id'=> 4, 'like'=> 888, 'category_id'=> 1],
        ]);
    }
}
