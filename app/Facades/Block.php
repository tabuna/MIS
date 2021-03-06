<?php
namespace App\Facades;

use App\Models\Block as BlockModel;
use Illuminate\Support\Facades\Facade;

class Block extends Facade
{
    public static function make($slug = '', $view = '', $limit = null)
    {
        $block = BlockModel::where('slug', $slug)->with([
            'items' => function ($query) use ($limit) {
                $query->orderBy('sort', 'asc');

                if (!empty($limit)) {
                    $query->take($limit);
                }
            }
        ])->first();

        if (view()->exists($view) && $block) {
            echo view()->make($view, ['block' => $block]);
        }
    }
}
