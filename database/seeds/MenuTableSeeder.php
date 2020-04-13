<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new Menu;
        $menu->id = "100";
        $menu->menu = "Dashboard";
        $menu->sub_menu = null;
        $menu->parent_id = 0;
        $menu->link = null;
        $menu->icon = "home";
        $menu->is_active = 1;
        $menu->target = "dashboard";
        $menu->save();

        $menu2 = new menu;
        $menu2->id = "200";
        $menu2->menu = "User Management";
        $menu2->sub_menu = null;
        $menu2->parent_id = 0;
        $menu2->link = null;
        $menu2->icon = "users";
        $menu2->is_active = 1;
        $menu2->target = "user";
        $menu2->save();

        $menu21 = new menu;
        $menu21->id = "201";
        $menu21->menu = null;
        $menu21->sub_menu = "User Profile";
        $menu21->parent_id = 200;
        $menu21->link = null;
        $menu21->icon = "users";
        $menu21->is_active = 1;
        $menu21->target = "user";
        $menu21->save();

        $menu3 = new menu;
        $menu3->id = "300";
        $menu3->menu = "Complain";
        $menu3->sub_menu = null;
        $menu3->parent_id = 0;
        $menu3->link = null;
        $menu3->icon = "list";
        $menu3->is_active = 1;
        $menu3->target = "complain";
        $menu3->save();

        $menu31 = new menu;
        $menu31->id = "301";
        $menu31->menu = null;
        $menu31->sub_menu = "Tiket";
        $menu31->parent_id = 300;
        $menu31->link = "tiket";
        $menu31->icon = "list";
        $menu31->is_active = 1;
        $menu31->target = "tiket";
        $menu31->save();

        $menu32 = new menu;
        $menu32->id = "302";
        $menu32->menu = null;
        $menu32->sub_menu = "History";
        $menu32->parent_id = 300;
        $menu32->link = "history";
        $menu32->icon = "history";
        $menu32->is_active = 1;
        $menu32->target = "history";
        $menu32->save();
    }
}
