<?php

namespace App\Widgets;

use Uasoft\Badaso\Interfaces\WidgetInterface;


class suratbalasanWidget implements WidgetInterface
{
    /**
     * Set permission for widget
     * set null to allow all role
     * multiple permission allowed, separate by comma.
     */
    public function getPermissions()
    {
        return 'browse_suratbalasan';
    }

    public function run($params = null)
    {
        return [
            'label' => 'Surat Balasan',
            'icon' => 'mail',
            'value' =>10,
            'max' =>80
        ];
    }
}
