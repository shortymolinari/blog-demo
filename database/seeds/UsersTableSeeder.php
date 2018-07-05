<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Permission::truncate();
        Role::truncate();
        User::truncate();

        //CreandoRoles
        $adminRole = Role::create(['name'=>'Admin', 'display_name' => 'administrador']);
        $writerRole = Role::create(['name'=>'Writer', 'display_name' => 'Escritor']);

        //Permisos para POSTS
        $viewPostsPermission = Permission::create(['name' => 'View posts', 'display_name' => 'Ver publicaciones']);
        $createPostsPermission = Permission::create(['name' => 'Create posts', 'display_name' => 'Crear publicaciones']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts', 'display_name' => 'Editar publicaciones']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts', 'display_name' => 'Eliminar publicaciones']);
        
        //Permisos para USUARIOS
        $viewUsersPermission = Permission::create(['name' => 'View users', 'display_name' => 'Ver usuarios']);
        $createUsersPermission = Permission::create(['name' => 'Create users', 'display_name' => 'Crear usuarios']);
        $updateUsersPermission = Permission::create(['name' => 'Update users', 'display_name' => 'Editar usuarios']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users', 'display_name' => 'Eliminar usuarios']);

        //Permisos para ROLES
        $viewRolesPermission = Permission::create(['name' => 'View roles', 'display_name' => 'Ver roles']);
        $createRolesPermission = Permission::create(['name' => 'Create roles', 'display_name' => 'Crear roles']);
        $updateRolesPermission = Permission::create(['name' => 'Update roles', 'display_name' => 'Editar roles']);
        $deleteRolesPermission = Permission::create(['name' => 'Delete roles', 'display_name' => 'Eliminar roles']);

        $deletePermissionsPermission = Permission::create(['name' => 'View permissions', 'display_name' => 'ver permisos']);
        $updatePermissionsPermission = Permission::create(['name' => 'Update permissions', 'display_name' => 'actualizar permisos']);
        
        //Creando Usuarios y asignando roles
        $admin = new User;
        $admin->name = "Shorty";
        $admin->email = "shortymolinari@gmail.com";
        //$admin->password = bcrypt('123456');//já foi encriptado em User.php
        $admin->password = '123456';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = "Raul";
        $writer->email = "raul@gamil.com";
        //$writer->password = bcrypt('123456');
        $writer->password = '123456';
        $writer->save();
        
        $writer->assignRole($writerRole);
    }
}