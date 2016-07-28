<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;
use Intervention\Image\Response;

class UsersController extends Controller
{
    public function avatar(){

        return view('users.avatar');
    }

    public function changeAvatar(Request $request){
        $file=$request->file('avatar');

        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = \Validator::make($input, $rules);
        if ( $validator->fails() ) {
            return Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);

        }
        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        Image::make($destinationPath. $filename)->fit(250)->save();
        $user=User::find(\Auth::user()->id);
        $user->avatar='/'.$destinationPath.$filename;
        $user->save();
        return \Response::json(
            [
                'success' => true,
                'avatar' => asset($destinationPath.$filename),
            ]
        );

    }

    public function cropAvatar(Request $request){
               dd($request);
    }
}
