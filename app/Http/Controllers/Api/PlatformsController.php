<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlatformsController extends Controller
{
    /**
     * Muestra una lista de todos los recursos.
     */
    public function index()
    {
        // Devuelve todas las plataformas como un arreglo JSON
        return response(Platform::all(), Response::HTTP_OK)->header('Content-Type', 'application/json');
    }

    /**
     * Almacena un nuevo recurso en la base de datos.
     */
    public function store(Request $request)
    {
        // Valida los datos de la petición
        $request->validate([
            'name' => 'required|string|unique:platforms',
            'description' => 'nullable|string',
            'logo' => 'nullable|url',
        ]);

        // Crea una nueva plataforma con los datos de la petición
        $platform = Platform::create($request->all());

        // Devuelve la plataforma creada como un objeto JSON
        return response($platform, Response::HTTP_CREATED)->header('Content-Type', 'application/json');
    }

    /**
     * Muestra el recurso especificado por el id.
     */
    public function show(string $id)
    {
        // Busca la plataforma por el id o lanza una excepción
        $platform = Platform::findOrFail($id);

        // Devuelve la plataforma como un objeto JSON
        return response($platform, Response::HTTP_OK)->header('Content-Type', 'application/json');
    }

    /**
     * Actualiza el recurso especificado por el id en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        // Busca la plataforma por el id o lanza una excepción
        $platform = Platform::findOrFail($id);

        // Valida los datos de la petición
        $request->validate([
            'nombre_plataforma' => 'required|string|unique:App\Models\Platform,nombre_plataforma,'.$id,
        ]);

        // Actualiza la plataforma con los datos de la petición
        $platform->update($request->all());

        // Devuelve la plataforma actualizada como un objeto JSON
        return response($platform, Response::HTTP_OK)->header('Content-Type', 'application/json');
    }

    /**
     * Elimina el recurso especificado por el id de la base de datos.
     */
    public function destroy(string $id)
    {
        // Busca la plataforma por el id o lanza una excepción
        $platform = Platform::findOrFail($id);

        // Elimina la plataforma de la base de datos
        $platform->delete();

        // Devuelve un mensaje de éxito como un objeto JSON
        return response(['message' => 'Plataforma eliminada exitosamente'], Response::HTTP_OK)->header('Content-Type', 'application/json');
    }
}
