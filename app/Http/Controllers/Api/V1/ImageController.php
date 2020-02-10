<?php
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $imageUrl = $this->image->uploadImage($request->file('file'), 'post-images');
            $s3Path = str_replace(config('filesystems.disks.s3.url'), '', $imageUrl);
            $image    = $this->image->create([
                'url'   => $imageUrl,
                's3_path' => $s3Path,
                'title' => 'post-images'
            ]);

            if (empty($image)) {
                \Log::error('Could not upload image');

                return response()->json(['message' => 'Could not upload image']);
            }

            return response()->json($image->id);
        }
    }
}
