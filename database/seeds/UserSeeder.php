<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1, 'email'=>'admin@gmail.com', 'password'=> bcrypt('123456'), 'name'=>'ADMIN'],
            ['id'=>2, 'email'=>'nguyeson@gmail.com', 'password'=>bcrypt('123456'), 'name'=>'Nguyễn Trường Sơn'],
            ['id'=>3, 'email'=>'nguyenthang@gmail.com', 'password'=>bcrypt('123456'), 'name'=>'Nguyễn Văn Thắng'],
            ['id'=>4, 'email'=>'tranAn@gmail.com', 'password'=>bcrypt('123456'), 'name'=>'Trần Đình An']
        ]);
    }
}
