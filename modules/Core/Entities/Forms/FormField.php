<?php

namespace Zix\Core\Entities\Forms;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FormField
 * @package Zix\Core\Entities\Forms
 */
class FormField extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'order', 'name', 'label', 'type', 'placeholder'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsToMany(Form::class);
    }

    public function rules()
    {
        return $this->belongsToMany(FormFieldRule::class, 'form_field_to_rule_field');
    }
}
