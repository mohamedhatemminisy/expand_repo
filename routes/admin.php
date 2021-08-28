<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


//note that the prefix is admin for all file route

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

        Route::get('/', 'DashboardController@index')->name('admin.dashboard');  // the first page admin visits if authenticated
        Route::get('logout', 'LoginController@logout')->name('admin.logout');
        Route::get('updateOrganization', 'SettingsController@updateOrganization')->name('updateOrganization');
        Route::post('store_settings', 'SettingsController@store_settings')->name('store_settings');
        Route::post('state', 'SettingsController@state')->name('state');
        Route::post('area', 'SettingsController@area')->name('area');

        Route::get('employee', 'EmployeeController@index')->name('employee');
        Route::post('store_employee', 'EmployeeController@store_employee')->name('store_employee');
        Route::get('emp_auto_complete', 'EmployeeController@emp_auto_complete')->name('emp_auto_complete');
        Route::get('emp_info', 'EmployeeController@emp_info')->name('emp_info');
        Route::get('emp_info_all', 'EmployeeController@emp_info_all')->name('emp_info_all');

        
        
        

        Route::get('department', 'DepartmentController@index')->name('department');
        Route::post('store_department', 'DepartmentController@store_department')->name('store_department');
        Route::post('depart_manger', 'DepartmentController@depart_manger')->name('depart_manger');
        Route::get('dept_auto_complete', 'DepartmentController@dept_auto_complete')->name('dept_auto_complete');
        Route::get('dep_info', 'DepartmentController@dep_info')->name('dep_info');
        Route::get('dep_info_all', 'DepartmentController@dep_info_all')->name('dep_info_all');
        
        Route::get('subscribers', 'SubscriberController@index')->name('subscribers');
        Route::post('store_subscriber', 'SubscriberController@store_subscriber')->name('store_subscriber');
        Route::get('subscribe_auto_complete', 'SubscriberController@subscribe_auto_complete')->name('subscribe_auto_complete');
        Route::get('subscribe_info', 'SubscriberController@subscribe_info')->name('subscribe_info');
        Route::get('subscribe_info_all', 'SubscriberController@subscribe_info_all')->name('subscribe_info_all');

        Route::get('projects', 'ProjectController@index')->name('projects');
        Route::post('store_project', 'ProjectController@store_project')->name('store_project');
        Route::post('depart_manger_project', 'ProjectController@depart_manger_project')->name('depart_manger_project');
        Route::get('project_auto_complete', 'ProjectController@project_auto_complete')->name('project_auto_complete');
        Route::get('project_info', 'ProjectController@project_info')->name('project_info');
        Route::get('project_info_all', 'ProjectController@project_info_all')->name('project_info_all');

        

        
        Route::get('enginering', 'orginzationsController@enginering')->name('enginering');
        Route::get('space', 'orginzationsController@space')->name('space');
        Route::get('banks', 'orginzationsController@banks')->name('banks');
        Route::get('suppliers', 'orginzationsController@suppliers')->name('suppliers');
        Route::get('orginzations', 'orginzationsController@index')->name('orginzations');
        Route::post('store_orginzation', 'orginzationsController@store_orginzation')->name('store_orginzation');
        Route::get('orginzation_auto_complete', 'orginzationsController@orginzation_auto_complete')
        ->name('orginzation_auto_complete');
        Route::get('orgnization_info', 'orginzationsController@orgnization_info')->name('orgnization_info');
        Route::get('orgnization_info_all', 'orginzationsController@orgnization_info_all')->name('orgnization_info_all');


        Route::get('dev_equp', 'AssetsController@dev_equp')->name('dev_equp');
        Route::post('store_equpment', 'AssetsController@store_equpment')->name('store_equpment');
        Route::get('equip_auto_complete', 'AssetsController@equip_auto_complete')
        ->name('equip_auto_complete');
        Route::get('equip_info', 'AssetsController@equip_info')->name('equip_info');
        Route::get('equip_info_all', 'AssetsController@equip_info_all')->name('equip_info_all');
        
  
        Route::get('buildings', 'SpecialAssetsController@buildings')->name('buildings');
        Route::get('Gardens_lands', 'SpecialAssetsController@Gardens_lands')->name('Gardens_lands');
        Route::get('warehouses', 'SpecialAssetsController@warehouses')->name('warehouses');
        Route::post('store_assets', 'SpecialAssetsController@store_assets')->name('store_assets');
        Route::get('asset_auto_complete', 'SpecialAssetsController@asset_auto_complete')
        ->name('asset_auto_complete');
        Route::get('asset_info', 'SpecialAssetsController@asset_info')->name('asset_info');
        Route::get('asset_info_all', 'SpecialAssetsController@asset_info_all')->name('asset_info_all');


        Route::get('vehicles', 'vehicleController@index')->name('vehicles');
        Route::post('store_vehcile', 'vehicleController@store_vehcile')->name('store_vehcile');
        Route::get('vehicle_auto_complete', 'vehicleController@vehicle_auto_complete')
        ->name('vehicle_auto_complete');
        Route::get('vehcile_info', 'vehicleController@vehcile_info')->name('vehcile_info');
        Route::get('vehcile_info_all', 'vehicleController@vehcile_info_all')->name('vehcile_info_all');

        Route::post('getConstantChildren', 'ExtentionsController@getConstantChildren')->name('getConstantChildren');
        Route::post('deleteSubConstant', 'ExtentionsController@deleteSubConstant')->name('deleteSubConstant');
        Route::post('store_model', 'ExtentionsController@store_model')->name('store_model');

        Route::get('full_search','SearchController@full_search')->name('full_search');
        Route::get('out_archieve','ArchieveController@out_archieve')->name('out_archieve');
      
        Route::get('archive_auto_complete','ArchieveController@archive_auto_complete')
        ->name('archive_auto_complete');
        Route::post('store_archive','ArchieveController@store_archive')->name('store_archive');
        Route::get('archieve_info_all','ArchieveController@archieve_info_all')
        ->name('archieve_info_all');
        
        Route::get('in_archieve','ArchieveController@in_archieve')->name('in_archieve');
        Route::get('emp_archieve','ArchieveController@emp_archieve')->name('emp_archieve');
        Route::get('dep_archieve','ArchieveController@dep_archieve')->name('dep_archieve');
        Route::get('cit_archieve','ArchieveController@cit_archieve')->name('cit_archieve');
        Route::get('mun_archieve','ArchieveController@mun_archieve')->name('mun_archieve');
        Route::get('proj_archieve','ArchieveController@proj_archieve')->name('proj_archieve');
        Route::get('title_archieve','ArchieveController@projArchive')->name('title_archieve');
        Route::get('title_archieve','ArchieveController@munArchive')->name('title_archieve');
        Route::get('lic_archieve','ArchieveController@licArchive')->name('lic_archieve');
        Route::get('licFile_archieve','ArchieveController@licFileArchive')->name('licFile_archieve');
        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
            Route::put('update', 'ProfileController@updateprofile')->name('update.profile');
        });


     

        /**
         * admins Routes
         */
        Route::group(['prefix' => 'users' , 'middleware' => 'can:users'], function () {
            Route::get('/', 'UsersController@index')->name('admin.users.index');
            Route::get('/create', 'UsersController@create')->name('admin.users.create');
            Route::post('/store', 'UsersController@store')->name('admin.users.store');
        });

    });

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {

        Route::get('login', 'LoginController@login')->name('admin.login');
        Route::post('login', 'LoginController@postLogin')->name('admin.post.login');

    });

});
