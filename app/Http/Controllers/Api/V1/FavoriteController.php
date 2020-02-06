<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function postFavorite(Request $request)
    {
        $input = $request->only($this->favoriteRepository->getBlankModel()->getFillable());

        try {
            $this->favoriteRepository->firstOrCreate($input);

        } catch (\Exception $e) {
            \Log::error($e);
            return response(['status' => 'fail']);
        }

        $likesCount = $this->favoriteRepository->getFavoriteCount($input['job_id']);

        return response([
            'status'     => 'success',
            'isLiked'    => true,
            'likesCount' => $likesCount,
        ]);
    }

    public function postDisFavorite(Request $request)
    {
        $input = $request->only($this->favoriteRepository->getBlankModel()->getFillable());

        try {
            $jobLike = $this->favoriteRepository->getBlankModel()->where($input)->first();

            $this->favoriteRepository->delete($jobLike);

        } catch (\Exception $e) {
            \Log::error($e);
            return response(['status' => 'fail']);
        }

        $likesCount = $this->favoriteRepository->getFavoriteCount($input['job_id']);

        return response([
            'status'     => 'success',
            'isLiked'    => false,
            'likesCount' => $likesCount,
        ]);
    }
}
