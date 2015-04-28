<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Session;
use App\Http\Requests\CategoryRequest;
use App\Models\Goods;

class CategoryController extends Controller {

    public function __construct()
    {
        //Тут должна быть проверка авторизации
        //$this->middleware('guest');
    }


    public function getIndex()
    {
        $Category = Category::where('ids', Session::get('website'))->orderBy('id', 'desc')->paginate(15);
        return view("dashboard/category/category",['Category' => $Category ]);
    }


    public function getAdd($Category = null)
    {
        $Category = Category::find($Category);
        return view("dashboard/category/view",['Category' => $Category ]);
    }


    //Добовление и изменение данных
    public function postIndex(CategoryRequest $request)
    {

        if(!is_null($request->id))
            $Category = Category::find($request->id);
        else
            $Category = new Category();

        $Category->title = $request->title;
        $Category->name = $request->name;
        $Category->text = $request->text;
        $Category->tag = $request->tag;
        $Category->avatar = $request->avatar;
        $Category->descript = $request->descript;
        $Category->ids = Session::get('website');
        $Category->save();

        //Флеш сообщение
        Session::flash('good', 'Вы успешно изменили значения');
        return redirect()->route('category');
    }







    public  function  getRestore($Category = null)
    {
        Category::withTrashed()->find($Category)->restore();
        Session::flash('good', 'Вы успешно востановили запись');
        return redirect()->route('category');
    }

    public function getTrash()
    {
        $Category = Category::onlyTrashed()->where('ids', Session::get('website'))->orderBy('id', 'desc')->paginate(15);
        return view("dashboard/category/trash", ['Category' => $Category]);
    }

    //Удаление
    public function getDestroy($Category = null)
    {
        $Category = Category::find($Category);
        $Category->delete();
        Session::flash('good', 'Вы успешно удалили значения');
        return redirect()->route('category');
    }

    public  function  getUnset($Feedback = null)
    {
        Category::withTrashed()->find($Feedback)->forceDelete();
        Session::flash('good', 'Вы успешно окончательно удалили запись');
        return redirect()->route('category');
    }



}