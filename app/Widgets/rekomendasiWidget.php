<?php

namespace App\Widgets;

use Uasoft\Badaso\Interfaces\WidgetInterface;


class rekomendasiWidget implements WidgetInterface
{
    /**
     * Set permission for widget
     * set null to allow all role
     * multiple permission allowed, separate by comma.
     */
    public function getPermissions()
    {
        return 'browse_rekomendasi';
    }

    public function run($params = null)
    {
        return [
            'label' => 'Judul',
            'icon' => 'inventory',
            'value' =>7,
            'max' =>80
        ];
    }
}
