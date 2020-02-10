<?php

namespace App\Services\S3;

interface S3ServiceInterface
{
    public function upload($file, $backet);

    public function getUrl($path);
}
