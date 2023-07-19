<?php

namespace App\Services;
 
use App\Models\Bio;
use Illuminate\Http\Request;
 
class BioService
{
    public function getIndex() {
        return Bio::paginate(10);
    }
    public function createBio(Request $request): Bio
    {
        // Create Bio
        $bio = Bio::create([
            'nickname' => $request->name,
            'personal_info' => $request->email,
            'user_id' => $request->user_id,
        ]);
 
 
        return $bio;
    }

    public function findBio($id): Bio
    {
        return Bio::find($id);
    }

    public function updateBio(Request $request, $id)
    {
        // Create Bio
        $Bio = Bio::findOrFail($id)->update([
            'nickname' => $request->nickname,
            'personal_info' => $request->personal_info,
        ]);
 
        return $Bio;
    }

    public function deleteBio($id){
        Bio::findOrFail($id)->delete();

        return ['success' => true, 'message' => 'Bio deleted successfully'];
    }
}