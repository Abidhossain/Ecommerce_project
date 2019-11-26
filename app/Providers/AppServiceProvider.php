<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\WebsiteConfig;
use App\Model\Slider;
use App\Model\Banner;
use Illuminate\Support\Facades\View;
use App;
use Illuminate\Support\Facades\Schema;

use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

         $web_configs = Schema::hasTable('website_configs');
         $slider = Schema::hasTable('sliders');
         $banner = Schema::hasTable('banners'); 
         if($web_configs === true &&  $slider === true && $banner === true){ 
            $company = WebsiteConfig::first(); 
            $sliders = Slider::get();
            $banners = Banner::take(3)->get();
            $data = [];
            $data['company'] = $company;
            $data['sliders'] = $sliders;
            $data['banners'] = $banners; 
            View::share($data);
         }
   
        // dd($company);

    


    }
}
