<?php

use Illuminate\Database\Seeder;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\Menu;
use Illuminate\Support\Facades\Log;

class DmtMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $customMenus = array(
          'Geography'=>array(
              'name'=> 'Geography',
              'url' => '#',
              'icon'=> 'fa-map-o',
              'type'=> 'custom', // options [custom, module],
              'parent' => '0',
              ),
          'Regions'=>array(
            'name' =>'Regions',
            'icon'=> 'fa-cube',
            'url'=> 'regions',
            'type'=> 'module',
            'parent' => 'Geography'
          ),
          'Districts'=>array(
            'name' => 'Districts',
            'icon'=> 'fa-cube',
            'url'=> 'districts',
            'type'=> 'module',
            'parent' => 'Geography'
          ),
          'Wards'=>array(
            'name' => 'Wards',
            'icon'=> 'fa-cube',
            'url'=> 'wards',
            'type'=> 'module',
            'parent' => 'Geography'
          )
      );

      $modules = Module::all();
      Log::info('*******'.count($modules).'*========');
      $defaultModules = ["Uploads", "Organizations","Users", "Departments", "Employees", "Roles", "Permissions", "Backups"];
      $parent = '0';
      foreach ($customMenus as $key => $menu) {

          if($menu['parent'] == $parent ){
            #Log::info(json_encode(Menu::where('name', 'Kasorobo')));

            //Create parent Menu
            Menu::create([
              "name" => $menu['name'],
              "url" =>  $menu['url'],
              "icon" => $menu['icon'],
              "type" => $menu['type'],
              "parent" => $parent
            ]);
          }
      }
      foreach ($modules as $module) {

        if( in_array($module->name, array_keys($customMenus))){
            //Fetch parent menu id
            $parentMenu = Menu::where('name', $customMenus[$module->name]['parent'])->first();
            if( $parentMenu ){
              $parent = $parentMenu->id;
            }
            //Create child menu
            Menu::create([
              "name" => $customMenus[$module->name]['name'],
              "url" => $module->name_db,
              "icon" => $module->fa_icon,
              "type" => 'module',
              "parent" => $parent
            ]);

        }else if(!in_array($module->name, $defaultModules) AND
          !in_array($module->name, array_keys($customMenus))){
            Menu::create([
  						"name" => $module->name,
  						"url" => $module->name_db,
  						"icon" => $module->fa_icon,
  						"type" => 'module',
  						"parent" => '0'
  					]);
        }
      }
    }
}
