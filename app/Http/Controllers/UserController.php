<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Traits\AuthTrait;
use App\Traits\SocialTrait;

class UserController extends Controller
{
    use SocialTrait, AuthTrait;
    protected $response;

    public function __construct(ResponseController $response)
    {
        $this->response = $response;
    }

    public function myProfile(Request $request)
    {
        $user = User::with('category')->findOrFail(Auth::user()->id);
        return $this->response->collectionResponse($request, $user);
    }

    public function getUser(Request $request, $id)
    {
        return $this->response->collectionResponse($request, User::active()->find($id));
    }

    public function updateProfile(Request $request)
    {
        $userAttr = ['name', 'country', 'bio', 'phone'];
        $documentName = null;
        if ($request->has('image') && $request->image != null) {
            $customMessages = [
                'required' => 'The :attribute field is required.',
                'dimensions' => 'Image dimension should be less than 300 x 300',
            ];
            $validator = Validator::make($request->all(), ['image' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=300,max_height=300'], $customMessages);
            if ($validator->fails())
                return $this->response->validationErrorResponse($request, $validator);
            $document = $request->file('image');
            $documentName = 'user-id-' . Auth::user()->id . '-' . time() . '.' . $document->getClientOriginalExtension();
            $document->storeAs('public/user-profile-pictures', $documentName);
            $userAttr = ['name', 'country', 'bio', 'phone', 'profile_image'];
        }
        $request['profile_image'] = $documentName;
        $user = User::find(Auth::user()->id);
        $user->update($request->only($userAttr));
        if ($request->device_type != 'web') {
            return $this->response->collectionResponse($request, $user);
        }
        Session::put('name', $user->name);
        Session::put('profile_image', $user->profile_image);
        return $this->response->successResponse($request, 'Record Updated Successfully');
    }
}
