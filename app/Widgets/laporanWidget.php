<?php

namespace App\Widgets;

use Uasoft\Badaso\Interfaces\WidgetInterface;


class laporanWidget implements WidgetInterface
{
    /**
     * Set permission for widget
     * set null to allow all role
     * multiple permission allowed, separate by comma.
     */
    public function getPermissions()
    {
        return 'browse_laporan';
    }

    public function run($params = null)
    {
        return [
            'label' => 'Laporan',
            'icon' => 'assignment',
            'value' =>3,
            'max' =>80
        ];
    }
}
