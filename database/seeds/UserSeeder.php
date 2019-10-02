<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        $memberRole = new Role();
        $memberRole->name = "peminjam";
        $memberRole->display_name = "Peminjam";
        $memberRole->save();
  
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('rahasiaaa');
        $admin->save();
         $admin->attachRole($adminRole);

        $member = new User();
        $member->name ='Member';
        $member->email ='member@gmail.com';
        $member->password = bcrypt('12345678');
        $member->save();
        $member->attachRole($memberRole);
    }
}
