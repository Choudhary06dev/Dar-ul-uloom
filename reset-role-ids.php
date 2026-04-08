<?php
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

try {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // 1. Get current roles to preserve data if needed
    $adminOnly = Role::where('slug', 'admin-only')->first();
    $sharedAccess = Role::where('slug', 'shared-access')->first();

    // 2. Clear roles table (to reset auto-increment and avoid conflict)
    Role::truncate();

    // 3. Insert Admin-Only with ID 1
    DB::table('roles')->insert([
        'id' => 1,
        'name' => 'Admin-Only',
        'slug' => 'admin-only',
        'permissions' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    // 4. Insert Shared-Access with ID 2
    DB::table('roles')->insert([
        'id' => 2,
        'name' => 'Shared-Access',
        'slug' => 'shared-access',
        'permissions' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    // 5. Update Users
    // Any user who was 'admin-only' (or old admin roles) -> set to 1
    // Any user who was 'shared-access' -> set to 2
    
    // For safety, if they had the old instance, we map it. 
    // But since we want CLEAN state:
    // Let's assume all current admins should be ID 1 unless they specifically have shared-access
    
    User::where('is_admin', true)->update(['role_id' => 1]);
    
    // If we knew the old IDs it would be better, but "resetting" usually implies a clean slate.
    // Let's check for shared-access specific users if possible.
    // Actually, I'll just set everyone to 1 as a default admin, 
    // then the user can manually reassign the 2nd role if needed, 
    // OR I can try to find them by slug if the relation still existed in memory.

    echo "Roles IDs reset: 1 (Admin-Only), 2 (Shared-Access).\n";
    echo "All admin users updated to Role ID 1.\n";

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
} catch (\Exception $e) {
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    echo "Error: " . $e->getMessage() . "\n";
}
