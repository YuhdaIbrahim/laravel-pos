<?php

namespace App\Http\Controllers\Api;
require '../vendor/autoload.php';
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $http = new \GuzzleHttp\Client;
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password
                ]
            ]);
            return $response->getBody();
        } catch (BadResponseException $e){
            if($e->getCode() === 400){
                return response()->json('Invalid Request. please enter a username or password', $e->getCode());
            } else if($e->getCode() === 401){
                return  response()->json('Your credential does not match in our record!', $e->getCode());
            }

            return response()->json('Something went wrong, please try again later', $e->getCode());
        }
    }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key){
            $token->delete();
        });

        return response()->json('Logged out successfully', 200);
    }
}
