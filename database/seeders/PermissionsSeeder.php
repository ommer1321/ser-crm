<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;



class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'user_id' => '32bd9142-d323-11ed-b70f-8c8caa20f3ca',
            'name' => 'Ömer Faruk',
            'surname' => 'Cetin',
            'user_name' => 'ommer1453',
            'phone' => '05422249930',
            'address' => 'burası adres alanı',
            'role' => 'teacher',
            'user_detail' => 'burası acıklama alanı asdjsanfıa suhsfhuasfhuaf\r\na fmasıjfnıasjfsa\r\nas fmaısjfnıas nhanfhınas',
            'profile_photo_path' => 'assets/images/users/avatar-1.jpg',
            'friend_allow' => '0',
            'email' => '1321o.faruk@gmail.com',
            'email_verified_at' => NULL,
            'password' => '$2y$10$SnPfgFK4Aqw9nA5nd7AqROTjWfKDW2HYrr8E/HnBXp37YX1e6ZCT2',
            'remember_token' => 'NZnLMshRn0Cq3UaceoSTYlU52czB87bUHdPYscpQURzCB6waO49hxv6ol6To',
            'created_at' => '2023-05-19 09:39:40',
            'updated_at' => '2023-05-19 09:39:40',

        ]);
        $user2 = \App\Models\User::factory()->create([
            'user_id' => '31bd9142-d323-11ed-b70f-8c8caa20f3ca',
            'name' => 'Faruk',
            'surname' => 'Cetin',
            'user_name' => 'ommer11453',
            'phone' => '05422249931',
            'address' => 'burası adres alanı',
            'role' => 'student',
            'user_detail' => 'burası acıklama alanı asdjsanfıa suhsfhuasfhuaf\r\na fmasıjfnıasjfsa\r\nas fmaısjfnıas nhanfhınas',
            'profile_photo_path' => 'assets/images/users/avatar-1.jpg',
            'friend_allow' => '0',
            'email' => 'faruk@gmail.com',
            'email_verified_at' => NULL,
            'password' => '$2y$10$SnPfgFK4Aqw9nA5nd7AqROTjWfKDW2HYrr8E/HnBXp37YX1e6ZCT2',
            'remember_token' => 'NZnLMshRn0Cq3UaceoSTYlU52czB87bUHdPYscpQURzCB6waO49hxv6ol6To',
            'created_at' => '2023-05-19 09:39:40',
            'updated_at' => '2023-05-19 09:39:40',

        ]);


        // Reset cached roles and permissions
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();



        // Yeni roller
        $adminRole = Role::create(['name' => 'admin']);
        $teacherRole = Role::create(['name' => 'teacher']);
        $studentRole = Role::create(['name' => 'student']);



        //Yeni izinler

        $createGrupPermission = Permission::create(['name' => 'create grup']);
        $readGrupPermission = Permission::create(['name' => 'read grup']);
        $updateGrupPermission = Permission::create(['name' => 'update grup']);
        $deleteGrupPermission = Permission::create(['name' => 'delete grup']);


        // Rollerle izinlerin ilişkilendirilmesi
        $adminRole->givePermissionTo($createGrupPermission, $readGrupPermission, $updateGrupPermission, $deleteGrupPermission);
        $teacherRole->givePermissionTo($createGrupPermission, $readGrupPermission, $updateGrupPermission, $deleteGrupPermission);
        $studentRole->givePermissionTo($readGrupPermission);

        $user->assignRole($studentRole);
        $user2->assignRole($teacherRole);

        // // Kullanıcının rol ve izinlerini kontrol etme
        // $user->hasRole('admin'); // Kullanıcının "admin" rolüne sahip olup olmadığını kontrol eder
        // $user->can('create blog'); // Kullanıcının "create blog" iznine sahip olup olmadığını kontrol eder
        // $user->hasAnyPermission('create blog', 'update blog'); // Kullanıcının "create blog" veya "update blog" izninden herhangi birine sahip olup olmadığını kontrol eder

        // -------------------------------

        // // create permissions
        // Permission::create(['name' => 'edit grup']);
        // Permission::create(['name' => 'delete grup']);
        // Permission::create(['name' => 'publish grup']);
        // Permission::create(['name' => 'unpublish grup']);

        // // create roles and assign existing permissions
        // $role1 = Role::create(['name' => 'writer']);
        // $role1->givePermissionTo('edit grup');
        // $role1->givePermissionTo('publish grup');

        // $role2 = Role::create(['name' => 'admin']);
        // $role2->givePermissionTo('unpublish grup');
        // $role2->givePermissionTo('publish grup');


        // // gets all permissions via Gate::before rule; see AuthServiceProvider
        // $role3 = Role::create(['name' => 'Super-Admin']);




        // create demo users
        // $user = \App\Models\User::factory()->create([
        //     'user_id' => '32bd9142-d323-11ed-b70f-8c8caa20f3ca',
        //     'name' => 'Ömer Faruk',
        //     'surname' => 'Cetin',
        //     'user_name' => 'ommer1453',
        //     'phone' => '05422249930',
        //     'address' => 'burası adres alanı',
        //     'role' => 'teacher',
        //     'user_detail' => 'burası acıklama alanı asdjsanfıa suhsfhuasfhuaf\r\na fmasıjfnıasjfsa\r\nas fmaısjfnıas nhanfhınas',
        //     'profile_photo_path' => 'assets/images/users/avatar-1.jpg',
        //     'friend_allow' => '0',
        //     'email' => '1321o.faruk@gmail.com',
        //     'email_verified_at' => NULL,
        //     'password' => '$2y$10$SnPfgFK4Aqw9nA5nd7AqROTjWfKDW2HYrr8E/HnBXp37YX1e6ZCT2',
        //     'remember_token' => 'NZnLMshRn0Cq3UaceoSTYlU52czB87bUHdPYscpQURzCB6waO49hxv6ol6To',
        //     'created_at' => '2023-05-19 09:39:40',
        //     'updated_at' => '2023-05-19 09:39:40',

        // ]);
        // $user->assignRole($role1);


        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Super-Admin User',
        //     'email' => 'superadmin@example.com',
        // ]);


        // $user->assignRole($role3);

    }
}
