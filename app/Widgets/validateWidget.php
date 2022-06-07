<?php

namespace App\Widgets;

use Uasoft\Badaso\Interfaces\WidgetInterface;


class validateWidget implements WidgetInterface
{
    /**
     * Set permission for widget
     * set null to allow all role
     * multiple permission allowed, separate by comma.
     */
    public function getPermissions()
    {
        return 'browse_validate';
    }

    public function run($params = null)
    {
        return [
            'label' => 'Tervalidasi',
            'icon' => 'check_circle_outline',
            'value' =>5,
            'max' =>80
        ];
    }
}
