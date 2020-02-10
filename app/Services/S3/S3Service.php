<?php

namespace App\Services\S3;

use Storage;

class S3Service implements S3ServiceInterface
{
    public function upload($file, $backet)
    {
        $path    = Storage::disk('s3')->putFile('farie', $file, 'public');
        $fullUrl = $this->getUrl($path);

        return $fullUrl;
    }

    public function getUrl($path)
    {
        return Storage::disk('s3')->url($path);
    }
}
