<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\APIError;
use Auth;
use \Carbon\Carbon;
use App\Models\User;


class AuthController extends Controller
{
    private static $tokenName = 'Sponsor Access Token';

    public function login(Request $req)
    {
        $this->validate($req->all(), [
            'pseudo' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only('pseudo', 'password'))) {
            $user = Auth::user();
            $user->last_login = Carbon::now();
            $user->save();
            $tokenResult = $user->createToken(self::$tokenName);
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addDay();
            if (null != $req->remember_me) {
                $token->expires_at = Carbon::now()->addMonth();
            }
            $token->save();
            $user = User::findWithProfile($user->id);
            return response()->json([
                'token' => [
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
                ],
                'user' => $user
            ]);
        } else {
            $unauthorized = new APIError;
            $unauthorized->setStatus("401");
            $unauthorized->setCode("AUTH_LOGIN");
            $unauthorized->setMessage("Incorrect login or password.");

            return response()->json($unauthorized, 401);
        }
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request->all(), [
            'oldpassword'     => 'required',
            'newpassword'     => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);
        $user = Auth::user();
        $usertmp = User::wherePasswordAndId(bcrypt($request->oldpassword), $user->id)->first();
        if ($usertmp == $user) {
            $unauthorized = new APIError;
            $unauthorized->setStatus("400");
            $unauthorized->setCode("BAD_PASSWORD");
            $unauthorized->setMessage("Your password is inscorrect.");
            return response()->json($unauthorized, 400);
        } else {
            $user->update([
                'password' => bcrypt($request->newpassword)
            ]);
        }
    }

    public function logout(Request $req)
    {
        if (Auth::check()) {
            $token = $req->user()->token();
            $token->revoke();
        }
        return response(null, 200);
    }

    public function user()
    {
        return Auth::user();
    }
}
