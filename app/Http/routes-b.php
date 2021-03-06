<?php


Route::group(['domain' => 'stomzn48.ru', 'namespace' => 'stomzn48'], function () {
    Route::resource('/search', 'SearchController');
    Route::resource('/articles', 'ArticlesController');
    Route::resource('/answers', 'AnswersController');
    Route::resource('/reviews', 'ReviewsController');
    Route::resource('/service', 'ServiceController');
    Route::resource('/page', 'PageController');
    Route::resource('/feedback', 'FeedbackController');
    Route::resource('/blog', 'BlogController');
    Route::resource('/team', 'TeamController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/', 'HomeController');
});

Route::group(['domain' => 'luchiki48.ru', 'namespace' => 'luchiki48'], function () {
    Route::resource('/search', 'SearchController');
    Route::resource('/articles', 'ArticlesController');
    Route::resource('/answers', 'AnswersController');
    Route::resource('/reviews', 'ReviewsController');
    Route::resource('/service', 'ServiceController');
    Route::resource('/page', 'PageController');
    Route::resource('/feedback', 'FeedbackController');
    Route::resource('/blog', 'BlogController');
    Route::resource('/gallery', 'GalleryController');
    Route::resource('/news', 'BlogController');
    Route::resource('/video', 'VideoGalleryController');
    Route::resource('/team', 'TeamController');
    Route::resource('/shares', 'SharesController');
    Route::resource('/questanswer', 'QuestAnswerController');

    Route::resource('/', 'HomeController');
});


Route::group(['domain' => 'sokzn48.ru', 'namespace' => 'sokzn48'], function () {
    Route::resource('/search', 'SearchController');
    Route::resource('/search', 'SearchController');
    //Route::resource('/articles', 'ArticlesController');
    Route::resource('/answers', 'AnswersController');
    Route::resource('/blog', 'BlogController');
    Route::resource('/feedback', 'FeedbackController');
    Route::resource('/gallery', 'GalleryController');
    Route::resource('/reviews', 'ReviewsController');
    Route::resource('/questanswer', 'QuestAnswerController');
    Route::resource('/service', 'ServiceController');
    Route::resource('/team', 'TeamController');
    Route::resource('/page', 'PageController');
    Route::resource('/shares', 'SharesController');
    Route::resource('/video', 'VideoGalleryController');
    Route::resource('/', 'HomeController');


});

Route::group(['domain' => 'cozn48.ru', 'namespace' => 'cozn48'], function () {
    Route::resource('/search', 'SearchController');
    Route::resource('/articles', 'ArticlesController');
    Route::resource('/answers', 'AnswersController');
    Route::resource('/reviews', 'ReviewsController');
    Route::resource('/service', 'ServiceController');
    Route::resource('/page', 'PageController');
    Route::resource('/feedback', 'FeedbackController');
    Route::resource('/blog', 'BlogController');
    Route::resource('/team', 'TeamController');
    Route::resource('/shares', 'SharesController');
    Route::resource('/', 'HomeController');
    Route::controller('/appointment', 'AppointmentController', [
        'getIndex' => 'appointment',
    ]);
});


Route::group(['domain' => 'zdorovie48.ru', 'namespace' => 'zdorovie48'], function () {
    Route::resource('/search', 'SearchController');
    Route::resource('/video', 'VideoGalleryController');
    Route::resource('/questanswer', 'QuestAnswerController');
    Route::resource('/medencyclopedia', 'EncyclopediaController');
    Route::resource('/encypost', 'EncyPostController');
    Route::resource('/articles', 'ArticlesController');
    Route::resource('/answers', 'AnswersController');
    Route::resource('/reviews', 'ReviewsController');
    Route::resource('/service', 'ServicesController');
    Route::resource('/service/complex', 'ServicesController');
    Route::resource('/shares', 'SharesController');
    Route::resource('/page', 'PageController');
    Route::resource('/gallery', 'GalleryController');
    Route::resource('/team', 'TeamController');
    Route::resource('/art', 'ArtController');
    Route::resource('/feedback', 'FeedbackController');
    Route::controller('/appointment', 'AppointmentController', [
        'getIndex' => 'appointment',
    ]);
    Route::resource('/blog', 'BlogController');
    Route::resource('/', 'HomeController');
    Route::controllers([
        'auth' => 'AuthController',
        'cabinet' => 'CabinetController'
        //'password' => 'Auth\RegistrationController',
    ]);

    Route::resource('/login', 'LoginController');
});

Route::group(['domain' => 'mother-baby.ru', 'namespace' => 'motherbaby'], function () {
    Route::resource('/search', 'SearchController');
    Route::resource('/video', 'VideoGalleryController');
    Route::resource('/questanswer', 'QuestAnswerController');
    Route::resource('/medencyclopedia', 'EncyclopediaController');
    Route::resource('/encypost', 'EncyPostController');
    Route::resource('/articles', 'ArticlesController');
    Route::resource('/answers', 'AnswersController');
    Route::resource('/reviews', 'ReviewsController');
    Route::resource('/service', 'ServicesController');
    Route::resource('/service/complex', 'ServicesController');
    Route::resource('/shares', 'SharesController');
    Route::resource('/page', 'PageController');
    Route::resource('/gallery', 'GalleryController');
    Route::resource('/team', 'TeamController');
    Route::resource('/art', 'ArtController');
    Route::resource('/feedback', 'FeedbackController');
    Route::controller('/appointment', 'AppointmentController', [
        'getIndex' => 'appointment',
    ]);

    Route::resource('/blog', 'BlogController');
    Route::resource('/', 'HomeController');
    Route::controllers([
        'auth' => 'AuthController',
        'cabinet' => 'CabinetController'
        //'password' => 'Auth\RegistrationController',
    ]);

    Route::resource('/login', 'LoginController');
});


Route::group(['domain' => 'gkzn48.ru', 'namespace' => 'gkzn48'], function () {
    //Route::resource('/search', 'SearchController');
    Route::resource('/video', 'VideoGalleryController');
    Route::resource('/questanswer', 'QuestAnswerController');
    Route::resource('/medencyclopedia', 'EncyclopediaController');
    Route::resource('/encypost', 'EncyPostController');
    Route::resource('/articles', 'ArticlesController');
    Route::resource('/answers', 'AnswersController');
    Route::resource('/reviews', 'ReviewsController');
    Route::resource('/service', 'ServicesController');
    Route::resource('/shares', 'SharesController');
    Route::resource('/page', 'PageController');
    Route::resource('/gallery', 'GalleryController');
    Route::resource('/team', 'TeamController');
    Route::resource('/art', 'ArtController');
    Route::resource('/feedback', 'FeedbackController');
    Route::controller('/appointment', 'AppointmentController', [
        'getIndex' => 'appointment',
    ]);
    Route::resource('/blog', 'BlogController');

    Route::resource('/', 'HomeController');


    Route::resource('/login', 'LoginController');

});


// Спец группа отмывания
Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard'], function () {
    Route::controller('sites', 'SitesController', [
        'getIndex' => 'sites',
    ]);
});


Route::resource('dashboard/spcat', 'Admin\SpecCatController');
Route::post('dashboard/spcat/store', 'Admin\SpecCatController@store');
Route::get('dashboard/spcat/edit/{id}', 'Admin\SpecCatController@edit');
Route::post('dashboard/spcat/update/{id}', 'Admin\SpecCatController@update');
Route::get('dashboard/spcat/destroy/{id}', 'Admin\SpecCatController@destroy');
Route::get('dashboard/video/destroy/{id}', 'Admin\VideoGalleryController@getDestroyAlbom');


Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'sentry'], 'prefix' => 'dashboard'], function () {
    //Route::resource('spcat', 'SpecCatController');
    Route::resource('video', 'VideoGalleryController');

    Route::resource('questanswer', 'QuestAnswerController');
    Route::resource('user', 'UserController');
    Route::resource('groups', 'GroupsController');
    Route::resource('encyclopedia', 'EncyclopediaController');
    Route::resource('encyclopediaCategory', 'EncyclopediaCategoryController');
    Route::resource('page', 'PageController');
    Route::resource('block', 'BlockController');
    Route::resource('news', 'NewsController');
    Route::resource('art', 'ArticlesController');
    Route::resource('shares', 'SharesController');
    Route::resource('filemanager', 'FilemanagerController');
    Route::resource('', 'AdminController');
    Route::resource('special', 'SpecialistyController');

    Route::resource('options', 'OptionsController');
    Route::resource('feedback', 'FeedbackController');
    Route::controller('reviews', 'ReviewsController', [
        'getIndex' => 'dashboard.reviews.index',
        'getAdd' => 'dashboard.reviews.add',
    ]);

    Route::controller('block/{block}/items', 'BlockItemController', [
        'getIndex' => 'dashboard.block_items',
        'getAdd' => 'dashboard.block_items.add',
    ]);

    Route::controller('category', 'CategoryController', [
        'getIndex' => 'dashboard.category.index',
        'getAdd' => 'dashboard.category.add',
    ]);

    Route::controller('goods', 'GoodsController', [
        'getIndex' => 'goods',
        'getAdd' => 'dashboard.goods.add',
    ]);
    Route::controller('subgoods', 'SubGoodsController', [
        'getIndex' => 'subgoods',
        'getAdd' => 'dashboard.subgoods.add',
    ]);

    Route::controller('goods_group', 'GoodsGroupController', [
        'getIndex' => 'goods_group',
        'getAdd' => 'dashboard.goods_group.add',
    ]);

    Route::controller('comments', 'CommentsController', [
        'getIndex' => 'dashboard.comments.index',
    ]);

    Route::controller('surveys', 'SurveysController', [
        'getIndex' => 'surveys',
    ]);


    Route::resource('categoryanswer', 'CategoryAnswersController');

    Route::controller('gallery', 'GalleryController', [
        'getIndex' => 'dashboard.gallery.index',
        'getAdd' => 'dashboard.gallery.add'
    ]);


    Route::resource('seostatic', 'SeoSaticController');

    Route::get('/wmenuindex', array('as' => 'wmenuindex', 'uses' => 'WmenuController@wmenuindex'));
    Route::post('/addcustommenu', array('as' => 'addcustommenu', 'uses' => 'WmenuController@addcustommenu'));
    Route::post('/deleteitemmenu', array('as' => 'deleteitemmenu', 'uses' => 'WmenuController@deleteitemmenu'));
    Route::post('/deletemenug', array('as' => 'deletemenug', 'uses' => 'WmenuController@deletemenug'));
    Route::post('/createnewmenu', array('as' => 'createnewmenu', 'uses' => 'WmenuController@createnewmenu'));
    Route::post('/generatemenucontrol',
        array('as' => 'generatemenucontrol', 'uses' => 'WmenuController@generatemenucontrol'));
    Route::post('/updateitem', array('as' => 'updateitem', 'uses' => 'WmenuController@updateitem'));


});

//API

Route::group(['namespace' => 'API', 'middleware' => 'cors', 'prefix' => 'api'], function () {
    Route::resource('/news', 'NewsController');
    Route::resource('/shares', 'ShareController');
    //Route::resource('/goods', 'GoodsAPI');
    //Route::resource('/subgoods', 'SubGoodsAPI');
    //Route::resource('/categories', 'CategoriesAPI');


    Route::controller('/service', 'ServiceController');
    Route::controller('/appointment', 'AppointmentsController');

});


//Перенаправление авторизации
Route::controllers([
    'auth' => 'Auth\AuthController',
    //'password' => 'Auth\RegistrationController',
]);


Route::group(['domain' => '{site}.{domain}'], function () {
    Route::get('sitemap.xml', 'SiteMapController@index');
});
