<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class RekomendasiCRUDDataDeleted extends Seeder
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
			$data_type = Badaso::model('DataType')->where('name', 'rekomendasi')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'rekomendasi')->delete();
            }

			Badaso::model('Permission')->removeFrom('rekomendasi');

			$menuItem = Badaso::model('MenuItem')::where('url', '/general/rekomendasi');

            if ($menuItem->exists()) {
                $menuItem->delete();
            }

			\DB::commit();
       	} catch(Exception $e) {
        	\DB::rollBack();

        	throw new Exception('Exception occur ' . $e);
       	}
    }
}
