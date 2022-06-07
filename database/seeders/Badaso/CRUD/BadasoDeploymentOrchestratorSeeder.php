<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Traits\Seedable;

class BadasoDeploymentOrchestratorSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = 'database/seeders/Badaso/CRUD/';

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        
        
        
        
        $this->seed(KeloladatamahasiswaCRUDDataDeleted::class);
        
        
        
        
        $this->seed(KeloladatadosenCRUDDataDeleted::class);
        
        
        
        
        
        
        
        
        
        
        $this->seed(RekomendasiCRUDDataDeleted::class);
        $this->seed(KelolaakunCRUDDataDeleted::class);
        $this->seed(KelolarekomendasiCRUDDataDeleted::class);
        $this->seed(KeloladatadosenCRUDDataTypeAdded::class);
        $this->seed(KeloladatadosenCRUDDataRowAdded::class);
        $this->seed(KeloladatamahasiswaCRUDDataTypeAdded::class);
        $this->seed(KeloladatamahasiswaCRUDDataRowAdded::class);
        $this->seed(KelolarekomendasiCRUDDataTypeAdded::class);
        $this->seed(KelolarekomendasiCRUDDataRowAdded::class);
        
        
        
        
        
        
        $this->seed(RekomendasiCRUDDataTypeAdded::class);
        $this->seed(RekomendasiCRUDDataRowAdded::class);
        $this->seed(PengajuanCRUDDataDeleted::class);
        
        
        $this->seed(PengajuanCRUDDataTypeAdded::class);
        $this->seed(PengajuanCRUDDataRowAdded::class);
        $this->seed(SuratbalasanCRUDDataTypeAdded::class);
        $this->seed(SuratbalasanCRUDDataRowAdded::class);
        
        
        $this->seed(RevisiCRUDDataDeleted::class);
        
        
        $this->seed(RevCRUDDataDeleted::class);
        
        
        $this->seed(XxxCRUDDataDeleted::class);
        $this->seed(XxxCRUDDataTypeAdded::class);
        $this->seed(XxxCRUDDataRowAdded::class);
        $this->seed(RevCRUDDataTypeAdded::class);
        $this->seed(RevCRUDDataRowAdded::class);
        
        
        $this->seed(ValidasiCRUDDataTypeAdded::class);
        $this->seed(ValidasiCRUDDataRowAdded::class);
        $this->seed(ValidCRUDDataTypeAdded::class);
        $this->seed(ValidCRUDDataRowAdded::class);
        $this->seed(LaporanCRUDDataDeleted::class);
        
        
        $this->seed(DecisionCRUDDataTypeAdded::class);
        $this->seed(DecisionCRUDDataRowAdded::class);
        $this->seed(LaporanCRUDDataTypeAdded::class);
        $this->seed(LaporanCRUDDataRowAdded::class);
    }
}
