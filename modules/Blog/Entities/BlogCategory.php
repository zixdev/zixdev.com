<?php

namespace Zix\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zix\Core\Helpers\Traits\Model\HasFiltrableTrait;
use Zix\Core\Helpers\Traits\Model\HasSeoTrait;
use Zix\Core\Helpers\Traits\Model\HasSiteTrait;
use Zix\Core\Helpers\Traits\Model\HasStatusTrait;

/**
 * Class BlogCategory
 * @package Zix\Blog\Entities
 */
class BlogCategory extends Model
{
    use HasStatusTrait, SoftDeletes, HasFiltrableTrait, HasSeoTrait, HasSiteTrait;
    /**
     * @var array
     */
    protected $fillable = ['title', 'slug', 'content', 'status', 'parent_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }
}
