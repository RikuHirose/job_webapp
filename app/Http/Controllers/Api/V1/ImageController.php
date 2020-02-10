<?php
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {

            $coverUrl = $this->s3Service->upload($request->file('file'), 'user-images');

            if (empty($coverUrl)) {
                \Log::error('Could not upload image');

                return response()->json(['message' => 'Could not upload image']);
            }

            return response()->json(['coverUrl' => $coverUrl]);
        }
    }
}
