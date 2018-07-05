<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersRolesController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //$user->syncRoles($request->roles);
        //El metodo syncRoles: 1-quita todos los roles del usuario | 2-agregar todos los roles que le pasemos por este metodo | esto evita roles duplicados

        $user->roles()->detach();
        //$user->syncPermissions($request->permissions);

        if( $request->filled('roles') ){

            $user->assignRole($request->roles);
        }

        return back()->withFlash('Los roles han sido actualizados');
    }
}
