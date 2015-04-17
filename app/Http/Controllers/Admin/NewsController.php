<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Request;
use Redirect;
use Validator;
use Session;
use App\Http\Requests\NewsRequest;


class NewsController extends Controller {

    public function __construct()
    {
        //Тут должна быть проверка авторизации
        //$this->middleware('guest');
    }


    public function getIndex()
    {
        $NewsList = News::where('ids', Session::get('website'))->orderBy('id', 'desc')->paginate(15);
        return view("dashboard/news/news", ['NewsList' => $NewsList]);
    }

    public function getAdd($news = null)
    {
        $news = News::find($news);

        return view("dashboard/news/newsCrud", ['News' => $news ]);
    }

    //Добовление и изменение данных
    public function postIndex(NewsRequest $request)
    {

        if(!is_null($request->id))
            $news = News::find($request->id);
        else
            $news = new News();

        $news->title = $request->title;
        $news->name = $request->name;
        $news->content = $request->content;
        $news->tag = $request->tag;
        $news->avatar = $request->avatar;
        $news->descript = $request->descript;
        $news->ids = Session::get('website');
        $news->save();

        //Флеш сообщение
        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->route('news');
    }



    //Удаление
    public function getDestroy($page = null)
    {
        $page = News::find($page);
        $page->delete();
        Session::flash('good', 'Вы успешно удалили значения');
        return redirect()->route('news');
    }




}
