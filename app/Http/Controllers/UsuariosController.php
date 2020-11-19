<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{
    public function index()
    {
        
        $registros = Usuario::all();

        
        return view('usuarios', ['registros' => $registros ] );
    }

    public function guardar(Request $request) 
    {   

        
        if (isset($request['id_edita']) && $request['id_edita']!='') {
            $registro = Usuario::find($request['id_edita']);            
        } else {
            $registro = new Usuario();
            
        }
        
        $registro->nombre = $request['nombre'];
        $registro->apellido = $request['apellido'];
        $registro->telefono = $request['telefono'];
        $registro->correo = $request['correo'];    
        $registro->direccion = $request['direccion'];    
        $registro->save();

        

        

        return redirect()->route('usuarios');
    }

    public function eliminar(Request $request) {        
        Usuario::destroy($request['id_elimina']);
        return redirect()->route('usuarios');
    }
}
