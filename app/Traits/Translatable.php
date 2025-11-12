<?php

namespace App\Traits;

trait Translatable
{
    public function translate($field)
    {
        $locale = app()->getLocale();
        $column = "{$locale}_{$field}";
        return $this->$column ?? $this->{config('app.fallback_locale') . "_{$field}"} ?? '';
    }
}
