<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class KeloladatadosenCRUDDataTypeAdded extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
        \DB::beginTransaction();

        try {

            $data_type = Badaso::model('DataType')->where('name', 'keloladatadosen')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'keloladatadosen')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 6,
                'name' => 'keloladatadosen',
                'slug' => 'keloladatadosen',
                'display_name_singular' => 'Kelola Data Dosen',
                'display_name_plural' => 'Kelola Data Dosen',
                'icon' => 'people',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => NULL,
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'is_maintenance' => 0,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => false,
                'created_at' => '2022-05-23T14:23:59.000000Z',
                'updated_at' => '2022-05-23T22:35:51.000000Z',
            ));

            Badaso::model('Permission')->generateFor('keloladatadosen');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/keloladatadosen')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Kelola Data Dosen',
                    'target' => '_self',
                    'icon_class' => 'people',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_keloladatadosen',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/keloladatadosen';
                $menu_item->title = 'Kelola Data Dosen';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'people';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_keloladatadosen';
                $menu_item->order = $order;
                $menu_item->save();
            }

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

           throw new Exception('Exception occur ' . $e);
        }
    }
}
