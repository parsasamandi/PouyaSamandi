<?php

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

Route::get('/cv','pouyaController@indexCv');
Route::get('/project','ProjectController@index');
Route::get('/login/login',[ 'as' => 'login.login', 'uses' => 'Auth\LoginController@index']);
Route::post('/post-login', 'Auth\LoginController@store');   
Route::get('/','GeneralController@index');
Route::post('/','pouyaController@storeEmail');

Route::group(['middleware' => 'auth'], function () {
  // Admin Page
  Route::get('/admin/home','AdminController@adminHome');
  Route::get('/logout', 'AdminController@logout');
  // Experience
  Route::group(['prefix' => 'experience', 'as' => 'experience.'], function() {
    Route::get('list', 'ExperienceController@list');
    Route::get('table/list', 'ExperienceController@experienceTable')->name('list.table');
    Route::post('new', 'ExperienceController@store');
    Route::get('edit', 'ExperienceController@edit');
    Route::get('delete/{id}', 'ExperienceController@delete');
  });
  // Education
  Route::group(['prefix' => 'education', 'as' => 'education.'], function() {
    Route::get('list', 'EducationController@list');
    Route::get('table/list', 'EducationController@educationTable')->name('list.table');
    Route::post('new', 'EducationController@store');
    Route::get('edit', 'EducationController@edit');
    Route::get('delete/{id}', 'EducationController@delete');
  });
  // Publication
  Route::group(['prefix' => 'publication', 'as' => 'publication.'], function() {
    Route::get('list', 'PublicationController@list');
    Route::get('table/list', 'PublicationController@publicationTable')->name('list.table');
    Route::post('new', 'PublicationController@store');
    Route::get('edit', 'PublicationController@edit');
    Route::get('delete/{id}', 'PublicationController@delete'); 
  });
  // Interest
  Route::group(['prefix' => 'interest', 'as' => 'interest.'], function() {
    Route::get('list', 'InterestController@list');
    Route::get('table/list', 'InterestController@interestTable')->name('list.table');
    Route::post('new', 'interestController@store');
    Route::get('edit', 'InterestController@edit');
    Route::get('delete/{id}', 'InterestController@delete');
  });
  // Skill
  Route::group(['prefix' => 'skill', 'as' => 'skill.'], function() {
    Route::get('list', 'SkillController@list');
    Route::get('table/list', 'SkillController@skillTable')->name('list.table');
    Route::post('store', 'SkillController@store');
    Route::post('description/store', 'SkillController@storeDescription');
    Route::get('edit', 'SkillController@edit');
    Route::get('delete/{id}', 'SkillController@delete');
  });
  // Refree
  Route::group(['prefix' => 'refree', 'as' => 'refree.'], function() {
    Route::get('list', 'RefreeController@list');
    Route::get('table/list', 'RefreeController@refreeTable')->name('list.table');
    Route::post('new', 'RefreeController@store');
    Route::get('edit', 'RefreeController@edit');
    Route::get('delete/{id}', 'RefreeController@delete');
  });
  // Admin
  Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('list', 'AdminController@list')->name('table');
    Route::get('table/list', 'AdminController@adminTable');
    Route::post('new', 'AdminController@store');
    Route::get('edit', 'AdminController@edit');
    Route::get('delete/{id}', 'AdminController@delete');
  });
  // Setting
  Route::prefix('setting')->group(function () {
    Route::get('homeSetting', 'SettingController@index');
    Route::post('homeSetting', 'SettingController@update');
  });
  // Project
  Route::group(['prefix' => 'project' ,'as' => 'project.'], function() {
    Route::get('list', 'ProjectController@list')->name('table');
    Route::get('list/table', 'ProjectController@projectTable')->name('list.table');
    Route::post('new', 'ProjectController@store')->name('store');
    Route::get('edit', 'ProjectController@edit')->name('edit');
    Route::get('/delete/{id}', 'ProjectController@delete');
  });
  // Description
  Route::group(['prefix' => 'description' ,'as' => 'description.'], function() {
    Route::get('list', 'DescriptionController@list')->name('table');
    Route::get('list/table', 'DescriptionController@descriptionTable')->name('list.table');
    Route::post('new', 'DescriptionController@store')->name('store');
    Route::get('edit', 'DescriptionController@edit')->name('edit');
    Route::get('/delete/{id}', 'DescriptionController@delete');
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
  Route::group(['prefix' => 'link' ,'as' => 'link.'], function() {
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
