<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class ValidasiCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'validate')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'validate')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 15,
                'name' => 'validate',
                'slug' => 'validasi',
                'display_name_singular' => 'Validasi Rekomendasi Judul',
                'display_name_plural' => 'Validasi Rekomendasi Judul',
                'icon' => 'check_circle_outline',
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
                'created_at' => '2022-05-31T11:55:17.000000Z',
                'updated_at' => '2022-05-31T12:04:16.000000Z',
            ));

            Badaso::model('Permission')->generateFor('validate');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/validasi')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Validasi Rekomendasi Judul',
                    'target' => '_self',
                    'icon_class' => 'check_circle_outline',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_validate',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/validasi';
                $menu_item->title = 'Validasi Rekomendasi Judul';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'check_circle_outline';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_validate';
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
