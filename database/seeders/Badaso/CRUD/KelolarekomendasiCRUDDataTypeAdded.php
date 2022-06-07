<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class KelolarekomendasiCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'kelolarekomendasi')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'kelolarekomendasi')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 1,
                'name' => 'kelolarekomendasi',
                'slug' => 'kelolarekomendasi',
                'display_name_singular' => 'Kelola Rekomendasi Judul',
                'display_name_plural' => 'Kelola Rekomendasi Judul',
                'icon' => 'inventory',
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
                'created_at' => '2022-05-23T14:03:02.000000Z',
                'updated_at' => '2022-05-31T10:45:44.000000Z',
            ));

            Badaso::model('Permission')->generateFor('kelolarekomendasi');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/kelolarekomendasi')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Kelola Rekomendasi Judul',
                    'target' => '_self',
                    'icon_class' => 'inventory',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_kelolarekomendasi',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/kelolarekomendasi';
                $menu_item->title = 'Kelola Rekomendasi Judul';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'inventory';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_kelolarekomendasi';
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
