<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cv', 'CvController@show');
Route::get('/project', 'ProjectController@index');
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@index']);
Route::post('/post-login', 'Auth\LoginController@store');
Route::get('/', 'GeneralController@index');
Route::post('/', 'pouyaController@storeEmail');

Route::group(['middleware' => 'auth'], function () {

  // Admin
  Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('list', 'AdminController@list')->name('table');
    Route::get('table/list', 'AdminController@adminTable');
    Route::post('new', 'AdminController@store');
    Route::get('edit', 'AdminController@edit');
    Route::get('delete/{id}', 'AdminController@delete');
  });

  // Admin Page
  Route::get('/admin/home', 'AdminController@adminHome');
  Route::get('/admin/home', 'AdminController@admin');
  Route::get('/logout', 'AdminController@logout');

  // Experience
  Route::group(['prefix' => 'experience', 'as' => 'experience.'], function () {
    Route::get('list', 'Experience\ExperienceController@list');
    Route::get('table/list', 'Experience\ExperienceController@experienceTable')
      ->name('list.table');
    Route::post('store', 'Experience\ExperienceController@store');
    Route::get('edit', 'Experience\ExperienceController@edit');
    Route::get('delete/{id}', 'Experience\ExperienceController@delete');
  });

  // Experience's description
  Route::group(['prefix' => 'experienceDescription', 'as' => 'experienceDescription.'], function () {
    Route::get('list', 'Experience\DescriptionController@list');
    Route::get('table/list', 'Experience\DescriptionController@experienceDescriptionTable')
      ->name('list.table');
    Route::post('store', 'Experience\DescriptionController@store');
    Route::get('edit', 'Experience\DescriptionController@edit');
    Route::get('delete/{id}', 'Experience\DescriptionController@delete');
  });

  // Skill
  Route::group(['prefix' => 'skill', 'as' => 'skill.'], function () {
    Route::get('list', 'Skill\SkillController@list');
    Route::get('table/list', 'Skill\SkillController@skillTable')
      ->name('list.table');
    Route::post('store', 'Skill\SkillController@store');
    Route::post('description/store', 'Skill\SkillController@storeDescription');
    Route::get('edit', 'Skill\SkillController@edit');
    Route::get('delete/{id}', 'Skill\SkillController@delete');
  });

  // Skill's description
  Route::group(['prefix' => 'skillDescription', 'as' => 'skillDescription.'], function () {
    Route::get('list', 'Skill\DescriptionController@list');
    Route::get('table/list', 'Skill\DescriptionController@skillDescriptionTable')
      ->name('list.table');
    Route::post('store', 'Skill\DescriptionController@store');
    Route::get('edit', 'Skill\DescriptionController@edit');
    Route::get('delete/{id}', 'Skill\DescriptionController@delete');
  });

  // Refree
  Route::group(['prefix' => 'refree', 'as' => 'refree.'], function () {
    Route::get('list', 'Refree\RefreeController@list');
    Route::get('table/list', 'Refree\RefreeController@refreeTable')->name('list.table');
    Route::post('store', 'Refree\RefreeController@store');
    Route::get('edit', 'Refree\RefreeController@edit');
    Route::get('delete/{id}', 'Refree\RefreeController@delete');
  });

  // Refree's description
  Route::group(['prefix' => 'refreeDescription', 'as' => 'refreeDescription.'], function () {
    Route::get('list', 'Refree\DescriptionController@list');
    Route::get('table/list', 'Refree\DescriptionController@refreeDescriptionTable')
      ->name('list.table');
    Route::post('store', 'Refree\DescriptionController@store');
    Route::get('edit', 'Refree\DescriptionController@edit');
    Route::get('delete/{id}', 'Refree\DescriptionController@delete');
  });

  // Setting
  Route::prefix('setting')->group(function () {
    Route::get('homeSetting', 'SettingController@index');
    Route::post('homeSetting', 'SettingController@update');
  });
  // Project
  Route::group(['prefix' => 'project', 'as' => 'project.'], function () {
    Route::get('list', 'ProjectController@list')->name('table');
    Route::get('list/table', 'ProjectController@projectTable')->name('list.table');
    Route::post('new', 'ProjectController@store')->name('store');
    Route::get('edit', 'ProjectController@edit')->name('edit');
    Route::get('/delete/{id}', 'ProjectController@delete');
  });

  Route::prefix('media')->group(function () {
    // Media
    Route::get('newMedia', 'MediaController@new');
    Route::post('newMedia', 'MediaController@store');
    Route::get('mediaList', 'MediaController@index');
    Route::get('mediaList/search', 'MediaController@search');
    Route::get('editMedia/{id}', 'MediaController@edit');
    Route::post('editMedia/{id}', 'MediaController@update');
    Route::delete('mediaList/{id}', 'MediaController@destroy');
    // Media Text
    Route::get('newMediaText', 'MediaTextController@new');
    Route::post('newMediaText', 'MediaTextController@store');
    Route::get('/media/mediaTextList', 'MediaTextController@index');
    Route::get('/media/mediaTextList/search', 'MediaTextController@search');
    Route::get('/media/editMediaText/{id}', 'MediaTextController@edit');
    Route::post('/media/editMediaText/{id}', 'MediaTextController@update');
    Route::delete('/media/mediaTextList/{id}', 'MediaTextController@destroy');
  });
  // Link
  Route::group(['prefix' => 'link', 'as' => 'link.'], function () {
    Route::get('list', 'LinkController@list');
    Route::get('list/table', 'LinkController@linkTable')->name('list.table')->middleware('signed');
    Route::post('new', 'LinkController@store');
    Route::get('edit', 'LinkController@edit');
    Route::get('eachDesc', 'LinkController@eachDesc');
    Route::get('/delete/{id}', 'LinkController@delete');
  });
  // Project
  Route::prefix('project')->group(function () {
    Route::get('newProjectTitle', 'ProjectTitleController@new');
    Route::post('newProjectTitle', 'ProjectTitleController@store');
    Route::get('projectTitleList', 'ProjectTitleController@index');
    Route::get('projectTitleList/search', 'ProjectTitleController@search');
    Route::get('editProjectTitle/{id}', 'ProjectTitleController@edit');
    Route::post('editProjectTitle/{id}', 'ProjectTitleController@update');
    Route::delete('projectTitleList/{id}', 'ProjectTitleController@destroy');
  });
});
