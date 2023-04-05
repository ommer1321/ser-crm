<?php

namespace App\Traits;

trait PageManager
{
    public function includeFiles(array $files)
    {
        foreach ($files as $file) {
            if (auth()->check()) {
                include $file;
            }
        }
    }
}
