<?php

namespace Zix\Core\Entities\Contact;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zix\Core\Helpers\Traits\Model\HasSiteTrait;
use Zix\Core\Helpers\Traits\Model\HasStatusTrait;

/**
 * Class Contact
 * @package Zix\Core\Entities\Contact
 */
class Contact extends Model
{
    use SoftDeletes, HasStatusTrait, HasSiteTrait;
    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'email', 'address' , 'message'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(ContactReply::class);
    }
}
