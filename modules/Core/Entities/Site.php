<?php

namespace Zix\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Zix\Core\Helpers\Traits\Model\SmartModelTrait;
use Zix\Core\Libraries\Sites\Traits\HasMultiSitesTrait;

class Site extends Model
{
    use HasMultiSitesTrait, SmartModelTrait;

    protected $fillable = ['name', 'url', 'ui'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versions()
    {
        return $this->hasMany(SiteVersion::class);
    }
}
