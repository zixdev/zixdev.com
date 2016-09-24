<?php

namespace Zix\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Zix\Core\Libraries\Sites\Traits\HasMultiSitesTrait;

class Site extends Model
{
    use HasMultiSitesTrait;

}
