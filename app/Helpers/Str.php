<?php

namespace App\Helpers;

use \Illuminate\Support\Str as SupportStr;

class Str extends SupportStr
{

    public static function nameSlug(array $targetSlug, $model): string
    {
        $name_slug = SupportStr::slug(implode(' ', $targetSlug), '-');

        if($model::query()->withTrashed()->Where('name_slug', '=', $name_slug)->exists()){
            $i = 1;
            while ($model::query()->Where('name_slug','=', $name_slug.'-'.$i)->exists()){
                $i ++;
            }
            $name_slug .= '-'. $i;
        }

        return $name_slug;
    }

}
