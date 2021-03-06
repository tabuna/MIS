<?php namespace App\Http\Controllers\gkzn48;

use App\Http\Controllers\Controller;
use App\Models\Sites;
use Request;
use Session;

class PageController extends Controller
{


    public function show($Pages, $sitename = 'gkzn48', $sitedomen = 'ru')
    {
        $getSites = Sites::where('domen', '=', $sitename . "." . $sitedomen)->first();

        $Page = $getSites->getPages()->find($Pages->id);

        return view($sitename . $sitedomen . '/page', [
            'Page' => $Page,
        ]);
    }
}
