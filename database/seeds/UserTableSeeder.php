<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
class UserTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
             'username' => 'Kcps',
             'password' => 'Kcps92939496!'
         ]);
        User::create([
            'username' => 'tony',
            'password' => 'ikheettony'
        ]);
    }
}