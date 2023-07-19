<?php

namespace App\Services;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 
class UserService
{
    
    public function getIndex() {
        return User::paginate(10);
    }

    public function createUser(Request $request): User
    {
        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
 
        // Avatar upload and update user
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars');
            $user->update(['avatar' => $avatar]);
        }
 
        return $user;
    }

    public function findUser($id): User
    {
        return User::with('bio', 'location')->find($id);
    }

    public function updateUser(Request $request, $id)
    {
        // Create user
        $user = User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
 
        return $user;
    }

    public function deleteUser($id){
        User::findOrFail($id)->delete();

        return ['success' => true, 'message' => 'User deleted successfully'];
    }
}