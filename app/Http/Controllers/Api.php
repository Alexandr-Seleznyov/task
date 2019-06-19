<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Users;
use Illuminate\Http\Request;

class Api extends Controller
{

    public function registrationPost(Request $request){

        $email = $request->get('email');
        $password = $request->get('password');
        $token = $request->get('_token');
        $error = '';

        try {
            $users = new Users();

            $user = $users::create([
                'email' => $email,
                'password' => bcrypt($password),
                'remember_token' => $token,
            ]);
        } catch (\Exception $e) {
            $error = $e;
        } catch (\Throwable $e) {
            $error = $e;
        }

        if(isset($user->id)){
            $result = [
                'status' => 1,
                'data' => [
                    'token' => $token,
                ],
            ];
        } else {
            $result = [
                'status' => 0,
                'data' => [
                    'error' => $error,
                ],
            ];
        }

        return json_encode($result);
    }



    public function userDetailsGet(Request $request){

        $token = $request->get('token');
        $error = null;

        try {
            $users = new Users();
            $user = $users->where('remember_token', $token)->first();

            if(!isset($user->id)){
                $error = 'Note not found';
            }

        } catch (\Exception $e) {
            $error = $e;
        } catch (\Throwable $e) {
            $error = $e;
        }

        if(isset($error)){
            $result = [
                'status' => 0,
                'data' => [
                    'error' => $error,
                ],
            ];
        } else {
            $result = [
                'status' => 1,
                'data' => [
                    'email' => $user->email,
                ],
            ];
        }

        return json_encode($result);
    }


    public function createPost(Request $request){

        $token = $request->get('token');
        $title = $request->get('title');
        $description = $request->get('description');
        $error = null;

        try {
            $users = new Users();

            $users = new Users();
            $user = $users->where('remember_token', $token)->first();


            if(isset($user->id)) {
                $note = new Note();
                $note =$note::create([
                        'users_id' => $user->id,
                        'title' => $title,
                        'description' => $description,
                ]);
            } else {
                $error = 'User not found';
            }

        } catch (\Exception $e) {
            $error = $e;
        } catch (\Throwable $e) {
            $error = $e;
        }

        if(isset($error)) {
            $result = [
                'status' => 0,
                'data' => [
                    'error' => $error,
                ],
            ];
        } else {
            $result = [
                'status' => 1,
                'data' => [
                    'note_id' => $note->id,
                ],
            ];
        }


        return json_encode($result);
    }




    public function updatePost(Request $request){

        $token = $request->get('token');
        $noteId = $request->get('note_id');
        $title = $request->get('title');
        $description = $request->get('description');
        $error = null;

        try {
            $users = new Users();
            $user = $users->where('remember_token', $token)->first();

            if(isset($user->id)) {

                $note = $user->note->find($noteId);

                if(isset($note->id)) {
                    $note->title = $title;
                    $note->description = $description;
                    $note->save();
                } else {
                    $error = 'Note not found';
                }

            } else {
                $error = 'User not found';
            }

        } catch (\Exception $e) {
            $error = $e;
        } catch (\Throwable $e) {
            $error = $e;
        }

        if(isset($error)) {
            $result = [
                'status' => 0,
                'data' => [
                    'error' => $error,
                ],
            ];
        } else {
            $result = [
                'status' => 1,
                'data' => [
                    'note_id' => $note->id,
                ],
            ];
        }


        return json_encode($result);
    }



    public function listGet(Request $request){

        $token = $request->get('token');
        $noteList = [];
        $error = null;

        try {
            $users = new Users();
            $user = $users->where('remember_token', $token)->first();

            if(isset($user->id)){
                foreach($user->note as $value){
                    $noteList[] = [
                        'id' => $value->id,
                        'title' => $value->title,
                        'description' => $value->description,
                    ];
                }
            } else {
                $error = 'Note not found';
            }

        } catch (\Exception $e) {
            $error = $e;
        } catch (\Throwable $e) {
            $error = $e;
        }

        if(isset($error)){
            $result = [
                'status' => 0,
                'data' => [
                    'error' => $error,
                ],
            ];
        } else {
            $result = [
                'status' => 1,
                'data' => [
                    'note_list' => $noteList,
                ],
            ];
        }

        return json_encode($result);
    }
}
