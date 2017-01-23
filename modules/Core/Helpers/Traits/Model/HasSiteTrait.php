<?php namespace Zix\Core\Helpers\Traits\Model;

trait HasSiteTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sites()
    {
        return $this->morphToMany(Site::class, 'siteable');
    }
}