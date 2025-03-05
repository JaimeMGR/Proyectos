<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Socio;
use Illuminate\Support\Facades\Validator;

class socioController extends Controller
{
    public function index()
    {
        $socios = Socio::all();

        $data = [
            'socios' => $socios,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:socio',
            'telefono' => 'required|digits:9',
            'idioma' => 'required|in:English,Spanish,French'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $socio = Socio::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'idioma' => $request->idioma
        ]);

        if (!$socio) {
            $data = [
                'message' => 'Error al crear al socio',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'socio' => $socio,
            'status' => 201
        ];
    }

    public function show($id)
    {
        $socio = Socio::find($id);

        if (!$socio) {
            $data = [
                'message' => 'Socio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'socio' => $socio,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $socio = Socio::find($id);

        if (!$socio) {
            $data = [
                'message' => 'Socio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $socio->delete();

        $data = [
            'message' => 'Socio eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $socio = Socio::find($id);

        if (!$socio) {
            $data = [
                'message' => 'Socio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:socio',
            'telefono' => 'required|digits:9',
            'idioma' => 'required|in:English,Spanish,French'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $socio->nombre = $request->nombre;
        $socio->email = $request->email;
        $socio->telefono = $request->telefono;
        $socio->idioma = $request->idioma;

        $socio->save();

        $data = [
            'message'   => 'Estudiante actualizado',
            'socio' => $socio,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $socio = Socio::find($id);

        if (!$socio) {
            $data = [
                'message' => 'Socio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'max:255',
            'email' => 'email|unique:socio',
            'telefono' => 'digits:9',
            'idioma' => 'in:English,Spanish,French'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        if ($request->has('nombre')) {
            $socio->nombre = $request->nombre;
        }

        if ($request->has('email')) {
            $socio->email = $request->email;
        }

        if ($request->has('telefono')) {
            $socio->telefono = $request->telefono;
        }

        if ($request->has('idioma')) {
            $socio->idioma = $request->idioma;
        }

        $socio->save();

        $data = [
            'message'   => 'Estudiante actualizado parcialmente',
            'socio' => $socio,
           'status' => 200
        ];

        return response()->json($data, 200);
    }
}
