<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Controller used to manage the Users of the API
 */
class UserController extends Controller
{
    const REGISTRATION_MESSAGES = [
        'name.required' => 'We need to know your e-mail address',
        'name.max' => 'Your name is too long',
        'email.required' => 'We need to know your e-mail address',
        'email.unique' => 'This email address has already been used!',
        'email.max' => 'Your email is too long',
        'password.required' => 'You need to set a password',
        'password.min' => 'Your password is too short'
    ];

    /**
     * Register a new user
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $codeStatus = 201;
        $message = ['name' => $request->input('name'), 'email' => $request->input('email')];

        if (empty($errors = $this->getRegistrationErrors($request))) {
            $this->store($request);
        } else {
            $codeStatus = 422;
            $message = ['errors' => implode(' | ', $errors)];
        }

        return response(
            json_encode($message), $codeStatus
            )->header('Content-Type', 'application/json');
    }

    /**
     *  Check the Registration request and get the error messages
     *
     * @return array All error messages regarding registration
     */
    protected function getRegistrationErrors(Request $request)
    {
        $errors = [];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ], self::REGISTRATION_MESSAGES);


        if ($validator->fails()) {
            $errors = $validator->errors()->all();
        }

        return $errors;
    }

    /**
     * Create the new user un the database
     *
     * @return \App\User
     */
    protected function store(Request $request)
    {
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
    }
}
