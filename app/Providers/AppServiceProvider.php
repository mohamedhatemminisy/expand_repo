<?php

namespace App\Providers;

use App\Support\Storage\Contracts\StorageInterface;
use App\Support\Storage\SessionStorage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         Schema::defaultStringLength(191);
         $this->app->bind(StorageInterface::class, function ($app) {
            return new SessionStorage('basket');
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view::composer('*' , function ($view){
            $setting = Setting::first();
            if($setting->address->city){
                $city_name = $setting->address->city->id;
            }else{
                $city_name ='';
            }
            if($setting->address->area){
                $area_name = $setting->address->area->id;
            }else{
                $area_name ='';
            }
            if($setting->address->region){
                $regionname = $setting->address->region->id;
            }else{
                $regionname ='';
            }
            $view-> with([
                  'setting'   => $setting,
                  'city_name'   => $city_name,
                  'area_name'   => $area_name,
                  'regionname'   => $regionname,
                     ]) ;
            });
     }
}
