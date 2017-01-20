<?php

namespace Zix\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zix\Core\Helpers\Traits\Model\HasFiltrableTrait;
use Zix\Core\Helpers\Traits\Model\HasSeoTrait;
use Zix\Core\Helpers\Traits\Model\HasStatusTrait;

/**
 * Class Page
 * @package Zix\Core\Entities
 */
class Page extends Model
{
    use HasStatusTrait, SoftDeletes, HasFiltrableTrait, HasSeoTrait;

    /**
     * @var array
     */
    protected $fillable = ['title', 'slug', 'content', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sites()
    {
        return $this->morphToMany(Site::class, 'siteable');
    }


}
