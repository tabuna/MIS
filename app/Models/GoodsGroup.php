<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsGroup extends Model
{
    public $SlugName = 'complex';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'goods_group';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'content',
        'avatar',
        'price',
        'category_id',
        'ids',
        'tag',
        'descript',
        'price',
        'sort',
        'slug',
        'upadate_at'
    ];
    /**
     * @var array
     */
    protected $searchFields = ['title', 'name'];
    protected $slugField = 'name';

    public function scopeGetSlug()
    {
        return $this->slugField;
    }

    // Категория группы
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    // Услуги группы
    public function goods()
    {
        return $this->belongsToMany('App\Models\GoodsDefault', 'goods_groups', 'good_group_id',
            'good_id')->select(['goods.*', 'count_visit']);
    }

    // Подуслуги группы
    public function subgoods()
    {
        return $this->belongsToMany('App\Models\SubGoods', 'subgoods_groups', 'good_group_id',
            'subgood_id')->select(['subgoods.*', 'count_visit']);
    }

    
}
