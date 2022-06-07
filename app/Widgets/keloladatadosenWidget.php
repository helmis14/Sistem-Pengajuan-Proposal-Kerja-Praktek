<?php

namespace App\Widgets;

use Uasoft\Badaso\Interfaces\WidgetInterface;


class keloladatadosenWidget implements WidgetInterface
{
    /**
     * Set permission for widget
     * set null to allow all role
     * multiple permission allowed, separate by comma.
     */
    public function getPermissions()
    {
        return 'browse_keloladatadosen';
    }

    public function run($params = null)
    {
        return [
            'label' => 'Dosen',
            'icon' => 'people',
            'value' =>3,
            'max' =>80
        ];
    }
}
