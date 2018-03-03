<?php

use App\User;
use App\Profile;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user= App\User::create([
       		'name' => 'Greg King',
       		'email' => 'gregking@example.com',
       		'password' => bcrypt('password'),
          'admin' => 1
       ]);
       App\Profile::create([
          'user_id' => $user->id,
          'avatar' => 'uploads/avatar/userprofile.jpg',
          'about' => 'In do dolore reprehenderit ut labore minim amet anim ad ut.',
          'facebook' => 'facebook.com',
          'youtube' => 'youtube.com'
       ]);
    }
}
