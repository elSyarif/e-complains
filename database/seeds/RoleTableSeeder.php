<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new Role;
        $role1->role = "Administrator";
        $role1->save();

        $role2 = new Role;
        $role2->role = "Direktur";
        $role2->save();

        $role3 = new Role;
        $role3->role = "Manager Produksi";
        $role3->save();

        $role4 = new Role;
        $role4->role = "Kepala Bagian";
        $role4->save();

        $role5 = new Role;
        $role5->role = "PMQA";
        $role5->save();

        $role6 = new Role;
        $role6->role = "Member";
        $role6->save();
    }
}
