<?php namespace App\Models;

use App\Services\Search\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shares extends Model
{

    use SoftDeletes, SearchableTrait;
    public $SlugName = 'shares';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shares';
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
        'start',
        'end',
        'tag',
        'descript',
        'ids',
        'upadate_at'
    ];
    /**
     * @var array
     */
    protected $searchFields = ['title', 'name', 'content'];
    protected $slugField = 'name';


    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'title' => 10,
            'name' => 10,
            'content' => 2,
            'tag' => 5,
            'descript' => 2,
        ]
    ];


    public function getSite()
    {
        return $this->belongsTo('App\Models\Sites', 'ids');
    }
}
