<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menus;
use App\Models\MenusHasUser;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.form');
    }

    public function store(Request $request)
    {
        $store = new User();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->type = $request->type;
        $store->password = bcrypt($request->password);
        $store->enabled = 1;
        $store->save();

        return redirect()->route('user')->with('success', 'Berhasil tambah user!');
    }

    public function setRole($id)
    {
        $data = User::findOrFail($id);
        $menu = Menus::get();

        return view('user.setRole', compact('data', 'menu'));
    }

    public function setRoleProcess(Request $request, $id)
    {
        if($request->menu_id){
            $menu = MenusHasUser::where('user_id', $id)->delete();
            foreach($request->menu_id as $row){
                $storeMenu = new MenusHasUser();
                $storeMenu->user_id = $id;
                $storeMenu->menu_id = $row;
                $storeMenu->save();
            }
        }
        $store = User::findOrFail($id);
        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = bcrypt($request->password);
        $store->save();

        

        return redirect()->route('user')->with('success', 'Berhasil tambah user!');
    }

    public function updateStatus($id, $status)
    {
        $update = User::findOrFail($id);
        $update->enabled = $status;
        $update->save();
        
        return redirect()->route('user')->with('success', 'Berhasil tambah produk!');
    }
}
