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

        Route::get('updateOrganization', 'SettingsController@updateOrganization')
        ->name('updateOrganization')->middleware('can:updateOrganization');
        Route::post('store_settings', 'SettingsController@store_settings')->name('store_settings');
        Route::post('state', 'SettingsController@state')->name('state');
        Route::post('area', 'SettingsController@area')->name('area');
        Route::get('Organization_info', 'SettingsController@Organization_info')->name('Organization_info');


        Route::get('employee', 'EmployeeController@index')->name('employee')->middleware('can:employee');
        Route::get('employee/id/{id}', 'EmployeeController@index');
        Route::post('store_employee', 'EmployeeController@store_employee')->name('store_employee');
        Route::get('emp_auto_complete', 'EmployeeController@emp_auto_complete')->name('emp_auto_complete');
        Route::get('emp_info', 'EmployeeController@emp_info')->name('emp_info');
        Route::get('emp_info_all', 'EmployeeController@emp_info_all')->name('emp_info_all');

        
        
        

        Route::get('department', 'DepartmentController@index')->name('department')->middleware('can:department');
        Route::get('department/id/{id}', 'DepartmentController@index');

        Route::post('store_department', 'DepartmentController@store_department')->name('store_department');
        Route::post('depart_manger', 'DepartmentController@depart_manger')->name('depart_manger');
        Route::get('dept_auto_complete', 'DepartmentController@dept_auto_complete')->name('dept_auto_complete');
        Route::get('dep_info', 'DepartmentController@dep_info')->name('dep_info');
        Route::get('dep_info_all', 'DepartmentController@dep_info_all')->name('dep_info_all');
        
        Route::get('subscribers', 'SubscriberController@index')->name('subscribers')->middleware('can:subscribers');
        Route::get('subscribers/id/{id}', 'SubscriberController@index')->name('subscriber');
        Route::post('store_subscriber', 'SubscriberController@store_subscriber')->name('store_subscriber');
        Route::get('subscribe_auto_complete', 'SubscriberController@subscribe_auto_complete')->name('subscribe_auto_complete');
        Route::get('subscribe_info', 'SubscriberController@subscribe_info')->name('subscribe_info');
        Route::get('subscribe_info_all', 'SubscriberController@subscribe_info_all')->name('subscribe_info_all');

        Route::get('projects', 'ProjectController@index')->name('projects')->middleware('can:projects');
        Route::get('projects/id/{id}', 'ProjectController@index');
        Route::post('store_project', 'ProjectController@store_project')->name('store_project');
        Route::post('depart_manger_project', 'ProjectController@depart_manger_project')->name('depart_manger_project');
        Route::get('project_auto_complete', 'ProjectController@project_auto_complete')->name('project_auto_complete');
        Route::get('project_info', 'ProjectController@project_info')->name('project_info');
        Route::get('project_info_all', 'ProjectController@project_info_all')->name('project_info_all');

        

        
        Route::get('enginering', 'orginzationsController@enginering')->name('enginering')->middleware('can:enginering');
        Route::get('enginering/id/{id}', 'orginzationsController@enginering');
        Route::get('space/id/{id}', 'orginzationsController@space');
        Route::get('space', 'orginzationsController@space')->name('space')->middleware('can:space');
        Route::get('banks', 'orginzationsController@banks')->name('banks')->middleware('can:banks');
        Route::get('banks/id/{id}', 'orginzationsController@banks');
        Route::get('suppliers/id/{id}', 'orginzationsController@suppliers');
        Route::get('suppliers', 'orginzationsController@suppliers')->name('suppliers')->middleware('can:suppliers');
        Route::get('orginzation', 'orginzationsController@index')->name('orginzation')->middleware('can:orginzation');
        Route::get('orginzation/id/{id}', 'orginzationsController@index');
        Route::post('store_orginzation', 'orginzationsController@store_orginzation')->name('store_orginzation');
        Route::get('orginzation_auto_complete', 'orginzationsController@orginzation_auto_complete')
        ->name('orginzation_auto_complete');
        Route::get('orgnization_info', 'orginzationsController@orgnization_info')->name('orgnization_info');
        Route::get('orgnization_info_all', 'orginzationsController@orgnization_info_all')->name('orgnization_info_all');


        Route::get('dev_equp', 'AssetsController@dev_equp')->name('dev_equp')->middleware('can:dev_equp');
        Route::get('dev_equp/id/{id}', 'AssetsController@dev_equp');
        Route::post('store_equpment', 'AssetsController@store_equpment')->name('store_equpment');
        Route::get('equip_auto_complete', 'AssetsController@equip_auto_complete')
        ->name('equip_auto_complete');
        Route::get('equip_info', 'AssetsController@equip_info')->name('equip_info');
        Route::get('equip_info_all', 'AssetsController@equip_info_all')->name('equip_info_all');
        
  
        Route::get('buildings', 'SpecialAssetsController@buildings')->name('buildings')->middleware('can:buildings');
        Route::get('buildings/id/{id}', 'SpecialAssetsController@buildings');
        Route::get('Gardens_lands/id/{id}', 'SpecialAssetsController@Gardens_lands');
        Route::get('Gardens_lands', 'SpecialAssetsController@Gardens_lands')->name('Gardens_lands')->middleware('can:Gardens_lands');
        Route::get('warehouses', 'SpecialAssetsController@warehouses')->name('warehouses')->middleware('can:warehouses');
        Route::get('warehouses/id/{id}', 'SpecialAssetsController@warehouses');
        Route::post('store_assets', 'SpecialAssetsController@store_assets')->name('store_assets');
        Route::get('asset_auto_complete', 'SpecialAssetsController@asset_auto_complete')
        ->name('asset_auto_complete');
        Route::get('asset_info', 'SpecialAssetsController@asset_info')->name('asset_info');
        Route::get('asset_info_all', 'SpecialAssetsController@asset_info_all')->name('asset_info_all');


        Route::get('vehicles', 'vehicleController@index')->name('vehicles')->middleware('can:vehicles');
        Route::get('vehicles/id/{id}', 'vehicleController@index');
        Route::post('store_vehcile', 'vehicleController@store_vehcile')->name('store_vehcile');
        Route::get('vehicle_auto_complete', 'vehicleController@vehicle_auto_complete')
        ->name('vehicle_auto_complete');
        Route::get('vehcile_info', 'vehicleController@vehcile_info')->name('vehcile_info');
        Route::get('vehcile_info_all', 'vehicleController@vehcile_info_all')->name('vehcile_info_all');

        Route::post('getConstantChildren', 'ExtentionsController@getConstantChildren')->name('getConstantChildren');
        Route::post('deleteSubConstant', 'ExtentionsController@deleteSubConstant')->name('deleteSubConstant');
        Route::post('store_model', 'ExtentionsController@store_model')->name('store_model');

        Route::get('search','SearchController@full_search');
        Route::get('out_archieve','ArchieveController@out_archieve')->name('out_archieve')->middleware('can:out_archieve');
      
        Route::get('archive_auto_complete','ArchieveController@archive_auto_complete')
        ->name('archive_auto_complete');
        Route::post('store_archive','ArchieveController@store_archive')->name('store_archive');
        Route::post('store_jal_archive','JalArchieveController@store_jal_archive')->name('store_jal_archive');
        Route::get('archieve_info_all','ArchieveController@archieve_info_all')
        ->name('archieve_info_all');
        Route::get('archievelic_info_all','ArchieveController@archievelic_info_all')
        ->name('archievelic_info_all');
        Route::get('archieve_report','ArchieveController@archieve_report')
        ->name('archieve_report');

        Route::get('in_archieve','ArchieveController@in_archieve')->name('in_archieve')->middleware('can:in_archieve');
        Route::get('emp_archieve','ArchieveController@emp_archieve')->name('emp_archieve')->middleware('can:emp_archieve');
        Route::get('dep_archieve','ArchieveController@dep_archieve')->name('dep_archieve')->middleware('can:dep_archieve');
        Route::get('cit_archieve','ArchieveController@cit_archieve')->name('cit_archieve')->middleware('can:cit_archieve');
        Route::get('mun_archieve','ArchieveController@mun_archieve')->name('mun_archieve')->middleware('can:mun_archieve');
        Route::get('proj_archieve','ArchieveController@proj_archieve')->name('proj_archieve')->middleware('can:proj_archieve');

        Route::get('title_archieve','ArchieveController@projArchive')->name('title_archieve');
        Route::get('title_archieve','ArchieveController@munArchive')->name('title_archieve');
        Route::get('lic_archieve','ArchieveController@licArchive')->name('lic_archieve')->middleware('can:lic_archieve');
        Route::get('jobLic_archieve','ArchieveController@jobLicArchive')->name('jobLic_archieve')->middleware('can:jobLic_archieve');
        Route::get('report_archieve','ArchieveController@reportArchive')->name('report_archieve')->middleware('can:report_archieve');
        Route::get('agenda_archieve','ArchieveController@agendaArchive')->name('agenda_archieve')->middleware('can:agenda_archieve');
        Route::get('agenda_report','ArchieveController@agendaReportArchive')->name('agenda_report')->middleware('can:agenda_report');

        Route::post('uploadAttach','ArchieveController@uploadAttach')->name('uploadAttach');
        Route::get('licFile_archieve','ArchieveController@licFileArchive')->name('licFile_archieve')->middleware('can:licFile_archieve');
        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
            Route::put('update', 'ProfileController@updateprofile')->name('update.profile');
        });
        Route::post('agendaAttach','AgendaArchieveController@agendaAttach')->name('agendaAttach');
        Route::get('searchEmpByName', 'AgendaArchieveController@searchEmpByName')
        ->name('searchEmpByName');
        Route::get('searchSubscriberByName', 'AgendaArchieveController@searchSubscriberByName')
        ->name('searchSubscriberByName');
        Route::post('doAddMeetingTitles','AgendaArchieveController@doAddMeetingTitles')->name('doAddMeetingTitles');
        Route::get('generalSearch', 'AgendaArchieveController@searchSubscriberByName')
        ->name('generalSearch');
        Route::post('deleteMeetingTitle','AgendaArchieveController@deleteMeetingTitle')
        ->name('deleteMeetingTitle');
        Route::post('getMeetingDetailsByID','AgendaArchieveController@getMeetingDetailsByID')
        ->name('getMeetingDetailsByID');
        Route::post('doEditMeetingTitle','AgendaArchieveController@doEditMeetingTitle')
        ->name('doEditMeetingTitle');
        
        
        
        

        Route::get('archieve_info', 'ArchieveController@archieve_info')->name('archieve_info');
        Route::get('archieveLic_info', 'ArchieveController@archieveLic_info')->name('archieveLic_info');
        Route::get('job_Lic_info', 'ArchieveController@job_Lic_info')->name('job_Lic_info');
        Route::get('archieveJoblic_info_all', 'ArchieveController@archieveJoblic_info_all')->name('archieveJoblic_info_all');
        Route::get('jalArchieve_info_all', 'ArchieveController@jalArchieve_info_all')->name('jalArchieve_info_all');

        Route::get('Linence_auto_complete','ArchieveController@Linence_auto_complete')
        ->name('Linence_auto_complete');
        Route::post('store_lince_archive','ArchieveController@store_lince_archive')
        ->name('store_lince_archive');

        Route::post('store_jobLic_archieve','ArchieveController@store_jobLic_archieve')
        ->name('store_jobLic_archieve');
        
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

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin'], function () {
    Route::get('search','SearchController@full_search');
    });
});
