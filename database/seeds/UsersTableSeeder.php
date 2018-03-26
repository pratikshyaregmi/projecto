<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user_one = new User();
      $user_one->role_id = '1';
      $user_one->name = 'Jane Doe';
      $user_one->about = 'Hello everybody!, I am Jane Doe';
      $user_one->website = 'nextearning.com';
      $user_one->facebook = 'facebook.com/pratikxyaregmi';
      $user_one->twitter = 'twitter.com/PratikshyaRegmi';
      $user_one->username = 'jane';
      $user_one->email = 'jane@example.com';
      $user_one->password = bcrypt('password');
      $user_one->save();
    }
}
