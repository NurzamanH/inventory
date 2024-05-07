<?php

namespace App\Http\Controllers;

use App\Models\MenusHasUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loadData()
    {
        if (Auth::guard('web')->user() != null) {
            $menu = MenusHasUser::where('user_id', Auth::user()->id)->get();    
            view()->share('dataMenu', $menu);
        }else{
            $menu = MenusHasUser::where('user_id', Auth::user()->id)->get();    
            view()->share('dataMenu', $menu);
        }

        
    }
}
