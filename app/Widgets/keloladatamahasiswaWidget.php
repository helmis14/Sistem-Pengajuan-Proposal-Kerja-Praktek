<?php

namespace App\Widgets;

use Uasoft\Badaso\Interfaces\WidgetInterface;


class keloladatamahasiswaWidget implements WidgetInterface
{
    /**
     * Set permission for widget
     * set null to allow all role
     * multiple permission allowed, separate by comma.
     */
    public function getPermissions()
    {
        return 'browse_keloladatamahasiswa';
    }

    public function run($params = null)
    {
        return [
            'label' => 'Mahasiswa',
            'icon' => 'school',
            'value' =>4,
            'max' =>80
        ];
    }
}
