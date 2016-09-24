<?php

namespace Zix\Core\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteVersion
 * @package Zix\Core\Entities
 */
class SiteVersion extends Model
{
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

    /**
     * Scope a query to only include enabled rows.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnabled($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope a query to only include disabled rows.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDisabled($query)
    {
        return $query->where('status', false);
    }

    /**
     * Scope a query to disable row.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDisable($query)
    {
        return $query->update(['status' => false]);
    }

    /**
     * Scope a query to enable row.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnable($query)
    {
        return $query->update(['status' => true]);
    }
}
