<?php
$adminRole = \App\Models\Role::firstOrCreate(['slug' => 'admin-only'], ['name' => 'Admin-Only']);
\App\Models\Role::firstOrCreate(['slug' => 'shared-access'], ['name' => 'Shared-Access']);

\App\Models\User::whereHas('role', function($q) { 
    $q->whereNotIn('slug', ['admin-only', 'shared-access']); 
})->update(['role_id' => $adminRole->id, 'is_admin' => true]); 

\App\Models\Role::whereNotIn('slug', ['admin-only', 'shared-access'])->delete();
echo "Roles fixed successfully.\n";
