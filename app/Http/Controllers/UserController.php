<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use Image;
class UserController extends Controller
{
    public function getInfo(){
        return new UserResource(Auth::user());
    }
    public function updateUserPhoto(Request $request, $userId)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,png,jpeg'
        ]);
        
        $userPhoto = $request->file('photo');
        $updateUserPhoto = User::find($userId);
        if ($request->hasFile('photo')) {
            
            $photoUniqueName = uniqid().'.'.$userPhoto->getClientOriginalExtension();
            $resizePhoto = Image::make($userPhoto)->resize(200,200)->save($photoUniqueName);
    
            if (!Storage::disk('public')->exists('users')) {
               Storage::disk('public')->makeDirectory('users');
            }
            if ($updateUserPhoto->photo !== 'default.png') {
                if (Storage::disk('public')->exists('users/'.$updateUserPhoto->photo)) {
                    Storage::disk('public')->delete('users/'.$updateUserPhoto->photo);
                 }
            }

            Storage::disk('public')->put('users/'.$photoUniqueName,$resizePhoto);
            unlink($photoUniqueName);

            $updateUserPhoto->photo = $photoUniqueName;
            $updateUserPhoto->save();
            return response()->json(['success' => 'User photo updated successfully :)'], 201);
            
        }
    }

    public function changeUserPassword(Request $request,$userId)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        if (Hash::check($request->old_password, Auth::user()->password) == true) {
            
            if (!Hash::check(Auth::user()->password, $request->password)) {
                $changePassword = User::find($userId);
                $changePassword->password = Hash::make($request->password);
                $changePassword->save();
                return response()->json(['success' => 'Password has been changed successfully. :)'], 202);
                
            }else {
                return response()->json(['error' => 'Your old password and changeable password is same. :)'], 422); 
            }
            
            return response()->json(['success' => 'matched'], 202);
            
        }else{
            return response()->json(['error' => 'Your old password did not match. :)'], 422); 
        }

    }

    public function addUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|confirmed',
        ]);

        $addUser = new User();
        $addUser->name = $request->name;
        $addUser->email = $request->email;
        $addUser->role = $request->role;
        $addUser->password = Hash::make($request->password);
        $addUser->save();
        
        return response()->json(['success' => 'User created successfully. :)'], 201);
        
    }
    public function updateUserName(Request $request, $userId)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $addUser =  User::find($userId);
        $addUser->name = $request->name;
        $addUser->save();
        
        return response()->json(['success' => 'User successfully Changed. :)'], 201);
        
    }


}
