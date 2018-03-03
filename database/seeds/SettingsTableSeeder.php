<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Setting::create([
       		'site_name' => "Laravel's Blog",
       		'address' => "Huntington Beach, California",
       		'contact_number' => '1-310-272-3400',
       		'contact_email' => 'info@laravel_blog.com'
       ]);
    }
}
