<?php

namespace App\Manager\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait CompanyBind
{

    /**
     * @return void
     */
    final public static function bootCompanyBind(): void
    {


        if (!is_super_admin()) {
            static::creating(static function ($model) {
                $model->company_id = Auth::user()?->company_id;
            });

            static::addGlobalScope('company', static function (Builder $builder) {
                return $builder->where('company_id', Auth::user()?->company_id);
            });
        }


    }
}
