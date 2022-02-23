<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthController extends Controller
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * Repository injection
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->userRepository = $userRepository;
    }


    /**
     * Register a User.
     *
     * @return JsonResponse
     */
    public function register(UserRequest $request): JsonResponse
    {
        if ($request->validated()) {
            $data = $request->all();
            $data['password'] = Hash::make($request->input('password'));
            $user = $this->userRepository->store($data);
            if ($user) {
                return response()->json([
                    "message" => "User registered successfully.",
                ]);
            } else {
                return response()->json([
                    "message" => "Something went wrong.",
                    "description" => "User registration failed."
                ], 500);
            }
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user() out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out.']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
