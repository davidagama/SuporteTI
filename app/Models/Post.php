<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;



class Post extends Model
{

    

    use AsSource, Filterable, Attachable;


    

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'body',
        'author'
    ];
   

    
}
