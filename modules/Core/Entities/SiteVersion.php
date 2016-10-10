<?php

namespace Zix\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Zix\Core\Helpers\Traits\Model\SmartModelTrait;

/**
 * Class SiteVersion
 * @package Zix\Core\Entities
 */
class SiteVersion extends Model
{
    use SmartModelTrait, HasMediaTrait;
    /**
     * @var array
     */
    protected $fillable = ['scripts', 'version'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
