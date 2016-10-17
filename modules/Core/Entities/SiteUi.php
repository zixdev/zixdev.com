<?php

namespace Zix\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zix\Core\Helpers\Traits\Model\HasStatusTrait;

class SiteUi extends Model
{
    use HasStatusTrait, HasMediaTrait, SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['scripts', 'size', 'version'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
