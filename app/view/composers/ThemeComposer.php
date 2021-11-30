<?php
namespace App\View\Composers;

use App\Theme;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ThemeComposer{

    public function compose(View $view){
        $view->with('themes',Theme::all());
        $url=DB::table("themes")->where('id',"=",Cookie::get('themeId'))->first();

        $view->with('themeUrl',$url);
    }

}
