<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $user = User::create([
            'nombre' => $request,
            'apellido' => $request,
            'dni' => $request,
            'direccion' => $request,
            'fecha_nacimiento' => $request,
            'sexo' => $request,
            'contrasena' => $request,
            'usuario' => $request,
            'rol' => $request,
        ]);

        return response()->json([
            'status' => true,
            'message' => "Usuario Creado con exito",
            'data' => $user
        ]);
    }

    public function login(Request $request): JsonResponse
    {
       $user = User::where('usuario', $request->usuario)->where('contrasena', $request->contrasena)->first();
       if($user)
       {
            $status = 'login';
            $message = 'Usuario ha iniciado sesion correctamente';
       }
       else{
            $status = 'not-login';
            $message = 'Usuario no ha iniciado sesion correctamente';
       }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $user
        ]);
    }

    public function getInspectores($idAdministrador): JsonResponse
    {
        $inspectores = User::where('idAdministrador', $idAdministrador)->get();

        return response()->json([
            'status' => true,
            'message' => "Inspectores obtenidos con exito",
            'data' => $inspectores
        ]);
    }

    public function updateUser(Request $request, User $user): JsonResponse
    {
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->dni = $request->dni;
        $user->direccion = $request->direccion;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->sexo = $request->sexo;
        $user->usuario = $request->usuario;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => "Inspector actualizado con exito",
            'data' => $user
        ]);
    }

    public function updateContrasena(Request $request, User $user): JsonResponse
    {
        if($request->contrasena == $request->repeat)
        {
            $user->contrasena = $request->contrasena;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => "Contraseña actualizada con exito",
                'data' => $user
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => "Contraseñas no coinciden, intente nuevamente",
                'data' => $user
            ]);
        }
    }

    public function deleteInspector(User $inspector)
    {
        $inspector->delete();

        return response()->json([
            'status' => true,
            'message' => "Inspector Eliminado con exito",
            'data' => ''
        ]);
    }
}
