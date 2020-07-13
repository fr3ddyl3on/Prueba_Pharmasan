<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PharmasanInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos el Troncate de las tablas
        DB::statement("SET foreign_key_checks=0"); 
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            Permission::truncate();
            Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        //User Admin
        $useradmin = User::where('email','admin@admin.com')->first();
        if($useradmin){
            $useradmin->delete();
        }
        $useradmin = User::create([
            'name'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('admin')
        ]); 
        
        $roladmin = Role::create([
            'nombre'            => 'admin',
            'slug'              => 'admin@admin.com',
            'descripcion'       => 'Administrador',
            'full-access'       => 'si',
        ]);
        
        //Creamos la relación de la tabla role_user
        $useradmin->roles()->sync([$roladmin->id]);

        // Permisos    
        $permission_all =[];

       
        //Permisos del Rol
        $permission = Permission::create([
            'nombre'            => 'Listar Rol',
            'slug'              => 'role.index',
            'descripcion'       => 'El Usuario Puede Listar los Roles',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Ver Rol',
            'slug'              => 'role.show',
            'descripcion'       => 'El Usuario Puede Ver los Roles',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Crear Rol',
            'slug'              => 'role.create',
            'descripcion'       => 'El Usuario Puede Crear los Roles',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Editar Rol',
            'slug'              => 'role.edit',
            'descripcion'       => 'El Usuario Puede Editar los Roles',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Eliminar Rol',
            'slug'              => 'role.destroy',
            'descripcion'       => 'El Usuario Puede Eliminar los Roles',
        ]);

        $permission_all[] = $permission->id;

        
        //Permisos del Usuario
        $permission = Permission::create([
            'nombre'            => 'Listar Usuarios',
            'slug'              => 'user.index',
            'descripcion'       => 'El Usuario Puede Listar los Usuarios',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Ver Usuarios',
            'slug'              => 'user.show',
            'descripcion'       => 'El Usuario Puede Ver los Usuarios',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Editar Usuarios',
            'slug'              => 'user.edit',
            'descripcion'       => 'El Usuario Puede Editar los Usuarios',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Eliminar Usuarios',
            'slug'              => 'user.destroy',
            'descripcion'       => 'El Usuario Puede Eliminar los Usuarios',
        ]);

        $permission_all[] = $permission->id;


        //************** */

        $permission = Permission::create([
            'nombre'            => 'Ver Usuario Propio',
            'slug'              => 'userown.show',
            'descripcion'       => 'El Usuario Puede Ver su Propio Usuario',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Editar Usuario Propio',
            'slug'              => 'userown.edit',
            'descripcion'       => 'El Usuario Puede Editar su Propio Usuario',
        ]);

        $permission_all[] = $permission->id;


        // ***********************  //////////////////////////

        $permission = Permission::create([
            'nombre'            => 'Listar Clientes',
            'slug'              => 'listclient.index',
            'descripcion'       => 'El Usuario Puede Listar los Clientes',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Crear Clientes',
            'slug'              => 'Createclient.create',
            'descripcion'       => 'El Usuario Puede Crear los Clientes',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Editar Clientes',
            'slug'              => 'editclient.edit',
            'descripcion'       => 'El Usuario Puede Editar los Clientes',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'nombre'            => 'Eliminar Clientes',
            'slug'              => 'deletclient.destroy',
            'descripcion'       => 'El Usuario Puede Eliminar los Clientes',
        ]);

        $permission_all[] = $permission->id;


        // //////////////////////////////////////******************** */

        $permission = Permission::create([
            'nombre'            => 'Ver Reporte',
            'slug'              => 'reporview.index',
            'descripcion'       => 'El Usuario Puede Listar los Medicamentos',
        ]);

        $permission_all[] = $permission->id;


    }
}
