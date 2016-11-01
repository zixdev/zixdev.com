<?php namespace Zix\Core\Helpers\Traits\Model;

trait HasFiltrableTrait
{
    public function scopeFiltrable($query)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->get('sort'));
            $query = $query->orderBy($sortCol, $sortDir);
        }

        if (request()->has('filter')) {
            $query = $query->where('name', 'LIKE', '%' . request()->get('filter') . '%');
        }

        if(request()->has('per_page')) {
            return $query->paginate(request()->get('per_page'));
        }

        return $query->get();
    }
}