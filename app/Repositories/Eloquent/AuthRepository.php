<?php


namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Validator;
use Auth;
use App\Http\Resources\AuthResource;
use App\Http\Requests\AuthRequest;





class AuthRepository
{
    public function login(Request $request)
    {

        $credentials = $request->only('cpf', 'password');
        $validator = Validator::make(
            $credentials,
            (new AuthRequest)->rules(),
            (new AuthRequest)->messages()
        );

        if ($validator->fails()) {
            return response()->json(
                ['errors' => $validator->messages()],
                Response::HTTP_NOT_ACCEPTABLE
            );
        }

        if (!$token = Auth::guard()->attempt($credentials)) {
            return response()->json([
                'errors' => [
                    'generic' => ['Falha, verifique as informações e tente novamente.']
                ]
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = User::where('cpf',$request->cpf)
            ->with('Conta')
            ->first();

        $user->token = $token;
        return new AuthResource($user);
    }

    public function logout()
    {

    }
}
