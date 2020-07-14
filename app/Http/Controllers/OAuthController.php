<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Controller used to login and get Access token using Oauth Passport
 */
class OAuthController extends Controller
{
    /**
     * Proceed to the login
     *
     * @return Response Json information containing the username and the access token
     */
    public function login(Request $request): Response
    {
        if (!$this->isFormCompleted($request)) {
            return response(
                json_encode(['errors' => 'Missing email or password']),
                422
            )->header('Content-Type', 'application/json');
        }

        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $messages = ['errors' => 'Wrong credentials'];
            $codeStatus = 401;
        } else {
            $accessToken = Auth::user()->createToken('Auth Token')->accessToken;

            $messages = [
                'username' => Auth::user()->name, 'access token' => $accessToken
            ];
            $codeStatus = 200;
        }

        return response(
            json_encode($messages),
            $codeStatus
        )->header('Content-Type', 'application/json');
    }

    /**
     * Check if the required fields are properly typed
     *
     * @return bool Return true if the form is properly completed. Return false Otherwise
     */
    protected function isFormCompleted(Request $request): bool
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $formWellCompleted = true;

        if ($validator->fails()) {
            $formWellCompleted = false;
        }

        return $formWellCompleted;
    }

    /**
     * Return an HTTP response asking for login so the user get a valid token
     *
     * @return Response Response in json format inviting the user to login
     */
    public function notifyInvalidToken(): Response
    {
        return response(
            json_encode(['message' => 'Invalid token. Please, login.']),
            401
        )->header('Content-Type', 'application/json');
    }
}
