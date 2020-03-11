<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function getAuth(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $result = User::where('username', $username)->get();
        if ($result && password_verify($password, $result[0]->password)) {
            return response()->json(['user' => $result, 'message' => 'Authenticated'], 200);
        } else {
            return response()->json(['message' => 'Not Authenticated'], 401);
        }
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->user_first_name = $request->firstName;
        $user->user_last_name = $request->lastName;
        $user->user_email = $request->email;
        $user->user_gender = $request->gender;
        $user->username = $request->username;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);

        $result = $user->save();

        return $result ? response()->json(['message' => 'OK'], 201) : response()->json(['message' => 'ERROR'], 500);
    }

    public function getUser(Request $request)
    {
        $id = $request->query('id');
        $user = User::find($id);

        return $user ? response()->json(['user' => $user], 200) : response()->json(['message' => 'NOT FOUND'], 200);
    }

    public function getUserByUsername(Request $request)
    {
        $username = $request->query('username');
        $check = $request->query('check');
        $user = User::where('username', $username)->get();

        if ($check) {
            return count($user) > 0 ? response()->json(['message' => "OK"], 200) : response()->json(['message' => 'NOT FOUND'], 200);
        } else {
            return count($user) > 0 ? response()->json(['user' => $user], 200) : response()->json(['message' => 'NOT FOUND'], 404);
        }
    }

    public function getUserByEmail(Request $request)
    {
        $email = $request->query('email');
        $check = $request->query('check');
        $user = User::where('user_email', $email)->get();

        if ($check) {
            return count($user) > 0 ? response()->json(['message' => "OK"], 200) : response()->json(['message' => 'NOT FOUND'], 200);
        } else {
            return count($user) > 0 ? response()->json(['user' => $user], 200) : response()->json(['message' => 'NOT FOUND'], 404);
        }
    }
}
