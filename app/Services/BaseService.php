<?php


namespace App\Services;


class BaseService
{
    /**
     * return design requests categories
     *
     * @return array
     */
    public static function getCategories()
    {
        return [
            '3d',
            '2d',
            'Flat',
            'House',
            'Sketch'
        ];
    }

    public static function getStatuses()
    {
        return [
            'New',
            'In process',
            'Completed',
        ];
    }

}
