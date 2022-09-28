<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Submission;
use Illuminate\Support\Facades\Config;
class DashboardComposer

{
    public $locales = [];
    
    public function __construct()
    {
     

        foreach (Config::get('app.locales') as $locale) {
            $currentLocale = "/".app()->getLocale()."/";
            $thisLocale = "/".$locale."/";
            $this->locales[$locale] = str_replace($currentLocale,$thisLocale,url()->full());
        }
    }


    public function compose(View $view)
    {

        $view->with([
            
            "locales" => $this->locales
        ]);
    }
}
