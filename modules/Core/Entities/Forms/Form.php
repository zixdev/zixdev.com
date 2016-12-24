<?php

namespace Zix\Core\Entities\Forms;

use Illuminate\Database\Eloquent\Model;
use Zix\Core\Entities\Site;

/**
 * Class Form
 * @package Zix\Core\Entities\Forms
 */
class Form extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'slug'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->belongsToMany(FormField::class, 'field_to_form');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sites()
    {
        return $this->belongsToMany(Site::class);
    }

    public function responses()
    {
        return $this->hasMany(FormResponse::class);
    }
}
