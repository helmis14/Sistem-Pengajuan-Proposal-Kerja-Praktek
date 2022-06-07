<?php

namespace App\Widgets;

use Uasoft\Badaso\Interfaces\WidgetInterface;


class pengajuanWidget implements WidgetInterface
{
    /**
     * Set permission for widget
     * set null to allow all role
     * multiple permission allowed, separate by comma.
     */
    public function getPermissions()
    {
        return 'browse_pengajuan';
    }

    public function run($params = null)
    {
        return [
            'label' => 'Pengajuan',
            'icon' => 'upload_file',
            'value' =>7,
            'max' =>80
        ];
    }
}
