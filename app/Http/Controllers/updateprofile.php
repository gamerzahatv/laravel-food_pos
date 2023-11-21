<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class updateprofile extends Controller
{
    public function update_profile(Request $request)
    {
        $userId = Auth::user()->id;
        $file = $request->file('image_user');
        $defaultimage = "/user_image/default_user.png";
        $filename = date('YmdHi') . $file->getClientOriginalName();


        //delete old image
        $getoldimage = DB::table('users')
            ->where('id', '=', $userId)
            ->select('profile_photo_path')
            ->value('profile_photo_path');
        $path = public_path($getoldimage); //old image path delete

        if ($getoldimage) {
            if (file_exists($path)) {
                unlink($path);
            }
            
        }
        if ($file) {
            $file->move(public_path("user_image"), $filename);
            $add_user = new User;
            $add_product['profile_photo_path'] = $filename;
            $upload_loc = '/user_image/';
            $full_path = $upload_loc . $filename;
            $update_userimage = DB::table('users')
                ->where('id', '=', $userId)
                ->update(['profile_photo_path' => $full_path]);
            return redirect()->route('profile.show');
        } else {
            abort(404);
        }
    }
}
