<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     *? Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::where('isDelete', false)->get();
        return response()->json([
            'success' => true,
            'response' => $users,
            'message' => 'Usuarios listados correctamente'
        ]);
    }
    /**
     *? Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {

        $user = User::create($request->all());
        return response()->json([
            'success' => true,
            'response' => $user,
            'message' => 'Usuario creado correctamente'
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->isDelete = true;
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'Usuario eliminado correctamente'
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'lastname' => 'string',
            'phone' => 'string|unique:users,phone,' . $user->id,
            'email' => 'email|unique:users,email,' . $user->id,
            'size' => 'numeric',
            'weight' => 'numeric',
        ]);

        $user->update($validator->validated());
        return response()->json([
            'success' => true,
            'response' => $user,
            'message' => 'Usuario actualizado correctamente.'
        ], Response::HTTP_OK);
    }
}
