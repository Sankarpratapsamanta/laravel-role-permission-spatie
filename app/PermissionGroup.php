<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    public function permission()
    {
        return $this->hasMany('Spatie\Permission\Models\Permission','permission_group_id', 'name');
    }
}
