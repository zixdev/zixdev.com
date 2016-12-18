<?php

namespace Zix\Core\Entities\Forms;

use Illuminate\Database\Eloquent\Model;
use Zix\Core\Entities\Site;

/**
 * Class FormResponse
 * @package Zix\Core\Entities\Forms
 */
class FormResponse extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['identifier', 'site_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function fields()
    {
        return $this->hasMany(FormResponseField::class);
    }
}
