<?php

namespace App\Permission\Models\Roles;

use App\Permission\Models\Permissions\Permission;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Permission\Models\Roles
 */
class Role extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['display_name','slug', 'level'];

    /**
     * A role has Many Permissions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
