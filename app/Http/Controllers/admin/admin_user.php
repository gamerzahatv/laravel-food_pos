<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\model_has_roles;
use App\Models\roles;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class admin_user extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(!Auth::check() || !Auth::user()->hasAnyRole(['admin', 'User'])) {
            return abort(404);
        }
        $fetch = DB::table('roles')
            ->select('users.profile_photo_path', 'users.id', 'users.name', 'users.created_at', 'users.updated_at', 'roles.name AS role_name')
            ->join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('users', 'model_has_roles.model_id', '=', 'users.id')
            ->paginate(10);
        return view('admin.admin_user', compact('fetch'));
    }

    public function user_info($id)
    {
        $fetch_user_info = User::find($id);
        //dd($fetch_product_info->product_name);

        return view('admin.admin_user_info', compact('fetch_user_info'));
    }

    public function user_del($id)
    {
        //$fetch_user_del = User::find($id)->delete();
        $fetch_user_del = User::find($id);
        if (!$fetch_user_del) {
            // If the product record doesn't exist, return an error
            return response()->json(['error' => 'Product not found.'], 404);
        }
        $fetch_user_del->delete();
        $imagePath = public_path($fetch_user_del->profile_photo_path);
        $defaultImagePath = public_path('/default_image/default_user.png');
        if ($imagePath !== $defaultImagePath &&file_exists($imagePath) && is_writable($imagePath)) {
            if (!unlink($imagePath)) {
                // If the file deletion fails, return an error
                return response()->json(['error' => 'Unable to delete product image.'], 500);
            }
        } else {
            // If the file doesn't exist or is not writable, log a warning
            Log::warning('Product image file not found or is not writable: ' . $imagePath);
        }
        return redirect()->route('adminuser');
    }

    public function admin_role($id)
    {
        $get_user = User::findOrFail($id);
        $get_user->hasAnyRole(['admin', 'User', '']);
        $get_user->syncRoles([]);
        $get_user->assignRole('admin');
        return redirect()->route('adminuser');
    }
    public function user_role($id)
    {
        $get_user = User::findOrFail($id);
        $get_user->hasAnyRole(['admin', 'User', '']);
        $get_user->syncRoles([]);
        $get_user->assignRole('User');

        return redirect()->route('adminuser');
    }

    public function usereditpage($id){
        
        return view('admin.admin_user_edit');
    }
}
