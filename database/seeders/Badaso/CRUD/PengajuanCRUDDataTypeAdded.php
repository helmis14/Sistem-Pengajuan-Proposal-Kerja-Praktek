<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class PengajuanCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'pengajuan')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'pengajuan')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 7,
                'name' => 'pengajuan',
                'slug' => 'pengajuan',
                'display_name_singular' => 'Pengajuan',
                'display_name_plural' => 'Pengajuan',
                'icon' => 'upload_file',
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
                'created_at' => '2022-05-23T14:26:21.000000Z',
                'updated_at' => '2022-05-30T04:19:02.000000Z',
            ));

            Badaso::model('Permission')->generateFor('pengajuan');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/pengajuan')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Pengajuan',
                    'target' => '_self',
                    'icon_class' => 'upload_file',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_pengajuan',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/pengajuan';
                $menu_item->title = 'Pengajuan';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'upload_file';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_pengajuan';
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
