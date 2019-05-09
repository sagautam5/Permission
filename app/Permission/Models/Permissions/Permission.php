<?php

namespace App\Permission\Models\Permissions;

use App\Permission\Models\Resources\Resource;
use App\Permission\Models\Roles\Role;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * @package App\Permission\Models\Permissions
 */
class Permission extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['role_id','resource','action'];

    /**
     * A permission belongs to a role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * A permission belongs to a role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
