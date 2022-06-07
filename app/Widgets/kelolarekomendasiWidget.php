<?php

namespace App\Widgets;

use Uasoft\Badaso\Interfaces\WidgetInterface;


class kelolarekomendasiWidget implements WidgetInterface
{
    /**
     * Set permission for widget
     * set null to allow all role
     * multiple permission allowed, separate by comma.
     */
    public function getPermissions()
    {
        return 'browse_kelolarekomendasi';
    }

    public function run($params = null)
    {
        return [
            'label' => 'Rekomendasi Judul',
            'icon' => 'inventory',
            'value' =>8,
            'max' =>80
        ];
    }
}
