<?php

namespace Zix\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zix\Core\Helpers\Traits\Model\HasFiltrableTrait;
use Zix\Core\Helpers\Traits\Model\HasStatusTrait;
use Zix\Core\Libraries\Sites\Traits\HasMultiSitesTrait;

class Site extends Model
{
    use HasMultiSitesTrait, HasStatusTrait, SoftDeletes, HasFiltrableTrait;

    protected $fillable = ['name', 'url', 'ui', 'status'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function uis()
    {
        return $this->hasMany(SiteUi::class);
    }
}
