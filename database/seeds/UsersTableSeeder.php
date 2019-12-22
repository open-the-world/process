<?php

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
      // 管理者
      \App\User::create([
          'name' => '管理者',
          'email' => 'a37mguilty4@icloud.com',
          'password' => bcrypt('jdTwhm/pL-65v4g&brWt!k9H_$UkYtp)y8'),
          'role' => 'owner'
      ]);

      // テスト
      \App\User::create([
          'name' => 'テストユーザー',
          'email' => 'test@gmail.com',
          'password' => bcrypt('12345678'),
          'role' => 'test'
      ]);
    }
}
