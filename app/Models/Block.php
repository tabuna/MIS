<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Remoblaser\Search\SearchableTrait;


class Block extends Model {

    use SoftDeletes,SearchableTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blocks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'name', 'content', 'tag', 'descript', 'ids'];


    /**
     * @var array
     */
    protected $searchFields = ['title', 'name', 'content'];



    public $SlugName = 'block';

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'title' => 10,
            'name' => 10,
            'content' => 20,
            'tag' => 5,
            'descript' => 2,
        ]
    ];

}
