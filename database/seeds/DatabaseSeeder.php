<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime();
        DB::table('working')->insert(
               [
                'demo_on' => 0,
                'temperature_on' => 0,
                'co_on' => 0,
                'warning_on' => 0,
                'email_notification_on' => 0,
            ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'type' => User::ADMIN_TYPE,
        ]);
        DB::table('noty')->insert([
            'co' => 0,
            'temperature' => 0,
        ]);
        DB::table('email_notification')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
