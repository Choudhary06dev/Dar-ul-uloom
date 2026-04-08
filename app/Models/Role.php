<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug', 'permissions'];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Check if role has a specific permission.
     * Core roles automatically have all permissions.
     */
    public function hasPermission($permission)
    {
        if (in_array($this->slug, ['admin-only', 'shared-access'])) {
            return true;
        }

        return in_array($permission, $this->permissions ?? []);
    }
}
