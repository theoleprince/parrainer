<?php

namespace App\Http\Controllers\Api\Parrainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\APIError;
use App\Models\ChatDiscussion;
use Auth;
use \Carbon\Carbon;
use App\Models\User;

class UserController extends Controller
{
    public function getUserInfo($id)
    {
        $user = User::whereId($id)->first();
        if (!$user) {
            $response = new APIError;
            $response->setStatus("404");
            $response->setCode("USER_NOT_FOUND");
            $response->setMessage("The user with id $id was not found");
            return response()->json($response, 404);
        }
        return response()->json($user);
    }

    public function getUsers(Request $req)
    {
        $connected_user = Auth::user();

        $page = $req->page;
        $limit = null;

        if ($req->limit && $req->limit > 0) {
            $limit = $req->limit;
        }

        if ($limit || $page) {
            $users = User::paginate($limit);
        } else {
            $users = User::all();
        }

        foreach ($users as $user) {
            $discussion = ChatDiscussion::whereUserId1AndUserId2($connected_user->id, $user->id)->first();
            if ($discussion == null) {
                $discussion = ChatDiscussion::whereUserId2AndUserId1($connected_user->id, $user->id)->first();
                if ($discussion != null) {
                    $user['chat_discussion_id'] = $discussion->id;
                    $user['chat_last_message'] = $discussion->last_message;
                    $user['chat_last_date'] = $discussion->updated_at;
                } else {
                    $user['chat_discussion_id'] = null;
                    $user['chat_last_message'] = null;
                    $user['chat_last_date'] = null;
                }
            } else {
                $user['chat_discussion_id'] = $discussion->id;
                $user['chat_last_message'] = $discussion->last_message;
                $user['chat_last_date'] = $discussion->updated_at;
            }
        }

        return response()->json($users);
    }
    public function delete(User $user)
    {
        $user->delete(); //No need to delete user field in user profile because this is only a soft delete
    }
    public function create(Request $req)
    {
        $data = $req->except('files');

        $data['avatar'] = '';
        //upload image
        if ($file = $req->file('avatar')) {
            $filePaths = $this->saveSingleImage($this, $req, 'avatar', 'users');
            $data['avatar'] = $filePaths;
        }

        $user = new User();
        $user->name = $data['name'] ?? null;
        $user->email = $data['email'] ?? null;
        $user->password = bcrypt($data['password']);
        $user->avatar = $data['avatar'] ?? null;
        $user->gender = $data['gender'] ?? null;
        $user->pseudo = $data['pseudo'] ?? null;
        $user->country = $data['country'] ?? null;
        $user->status = $data['status'] ?? null;
        $user->age = $data['age'] ?? null;
        $user->type = $data['type'] ?? null;
        $user->happen = $data['happen'] ?? null;
        $user->profession = $data['profession'] ?? null;
        $user->profile = $data['profile'] ?? null;
        $user->language = $data['language'] ?? null;
        $user->save();

        return response()->json($user);
    }

    public function update(Request $req, $id)
    {
        $user = User::find($id);
        if (!$user) {
            $apiError = new APIError;
            $apiError->setStatus("404");
            $apiError->setCode("USER_NOT_FOUND");
            return response()->json($apiError, 404);
        }

        $data = $req->except('files');

        if (isset($data['password']) && strlen($data['password']) >= 4) {
            $data['password'] = bcrypt($data['password']);
        }

        //upload image
        if ($file = $req->file('avatar')) {
            $filePaths = $this->saveSingleImage($this, $req, 'avatar', 'users');
            $data['avatar'] = $filePaths;
        }

        if (isset($data['pseudo'])) $user->pseudo = $data['pseudo'];
        if ($req['email'] != $user->email) {
            $user1 = User::whereEmail($req['email'])->first();
            if ($user1 != null) {
                return response()->json([
                    'message' => 'email existant'
                ], 400);
            }
            $data['email'] = $req['email'];
        }

        if (isset($data['email'])) $user->email = $data['email'];
        if (isset($data['password'])) $user->password = $data['password'];
        if (isset($data['gender'])) $user->gender = $data['gender'];
        if (isset($data['country'])) $user->country = $data['country'];
        if (isset($data['status'])) $user->status = $data['status'];
        if (isset($data['age'])) $user->age = $data['age'];
        if (isset($data['type'])) $user->type = $data['type'];
        if (isset($data['avatar'])) $user->avatar = $data['avatar'];
        if (isset($data['happen'])) $user->happen = $data['happen'];
        if (isset($data['profession'])) $user->profession = $data['profession'];
        // if (isset($data['profession_id'])) $user->profession_id = $data['profession_id'];
        if (isset($data['profile'])) $user->profile = $data['profile'];
        if (isset($data['language'])) $user->language = $data['language'];

        $user->update();


        return response()->json([$user]);
    }
}
