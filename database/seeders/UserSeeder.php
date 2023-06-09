<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Edgar Chumil',
            'phone' => '58501360',
            'email' => 'edgarcha91@gmail.com',
            'profile' => 'SUPER',
            'status' => 'ACTIVE',
            'password' => bcrypt('Chumil2020')
        ]);
        User::create([
            'name' => 'Bryant Julajuj',
            'phone' => '48967833',
            'email' => 'alexanderjulajuj15@gmail.com',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('Alexander2020')
        ]);
        User::create([
            'name' => 'Rafael Julajuj',
            'phone' => '58047589',
            'email' => 'kevinjulajuj@gmail.com',
            'profile' => 'EMPLOYEE',
            'status' => 'ACTIVE',
            'password' => bcrypt('Kevin123')
        ]);

        // crear role Administrador
        $admin    = Role::create(['name' => 'ADMIN']);

        // crear permisos componente categories
        Permission::create(['name' => 'Category_Create']);
        Permission::create(['name' => 'Category_Search']);
        Permission::create(['name' => 'Category_Update']);
        Permission::create(['name' => 'Category_Destroy']);

        // asignar permisos al rol admin sobre categories
        $admin->givePermissionTo(['Category_Create', 'Category_Search', 'Category_Update', 'Category_Destroy']);

        // asignar role admin al usuario Edgar Chumil
        $uAdmin = User::find(1);
        $uAdmin->assignRole('ADMIN');
    }
}
