<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\Node;

class Category extends Node
{

    use SoftDeletes;
    public $SlugName = 'category';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'text',
        'tag',
        'descript',
        'avatar',
        'ids',
        '_lft',
        '_rgt',
        'parent_id',
        'upadate_at'
    ];

    //Связь категории с товаром

    public function goods()
    {
        return $this->hasMany('App\Models\Goods');
    }


    /*
    public function comment()
    {
        return $this->hasManyThrough('App\Models\Goods', 'App\Models\Comments', 'category_id', 'goods_id');
    }
*/

    //Обратная Зависимость от сайта
    public function site()
    {
        return $this->belongsTo('App\Models\Sites', 'ids');
    }

    // Комплексные услуги
    public function complexGoods()
    {
        return $this->hasMany('App\Models\GoodsGroup', 'category_id');
    }


    
    //Услуги которые отображаются в категории
    public function mygoods()
    {
        return $this->belongsToMany('App\Models\Goods', 'goods_categories', 'category_id', 'good_id');
    }

   
}
