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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Auth::routes();

Route::get('/', 'PortalController@inicio')->name('inicio');
Route::get('/home', 'HomeController@index')->name('home');

//Users
Route::resource('users', 'AdminUsersController');

//Candidates
Route::prefix('candidates')->group(function (){
	Route::get('list/{type}', 'CandidatesController@list');
    Route::get('newCourse/{planning_id}', 'CoursesController@newCourse');
});
Route::resource('candidates', 'CandidatesController');

//Students
Route::prefix('students')->group(function (){
	Route::get('list/{type}', 'StudentsController@list');
	Route::post('selectWinners', 'StudentsController@selectWinners');
    Route::get('generate-excel', 'StudentsController@generate_excel');
});
Route::resource('students', 'StudentsController');

//Courses
Route::prefix('courses')->group(function (){
	Route::get('list', 'CoursesController@getList');
    Route::match(['get', 'post'],'data-form/{id}', 'CoursesController@editInfo');
    Route::put('update-data/{id}', 'CoursesController@updateInfo')->name('courses.saveData');
    Route::get('info/{id}', 'CoursesController@public_view');
    Route::get('remove_course/{id}/{value}', 'CoursesController@remove_course')->name('courses.remove');
});
Route::resource('courses', 'CoursesController');

//Announcements
Route::prefix('announcements')->group(function (){
    Route::get('list', 'AnnouncementsController@getList');
});
Route::resource('announcements', 'AnnouncementsController');

//Events
Route::prefix('events')->group(function (){
    Route::get('list', 'EventsController@getList');
});
Route::resource('events', 'EventsController');

//Planning
Route::resource('planning', 'PlanningController');
Route::post('sendPlanning/{id}/{value}', 'PlanningController@sendPlanning');

//Participants
Route::prefix('participants')->group(function (){
    Route::get('list/{course_id}', 'ParticipantsController@getList');
});
Route::resource('participants', 'ParticipantsController');

//Attendance
Route::prefix('attendance')->group(function (){
    Route::get('list/{course_id}', 'AttendanceController@getList');
});
Route::resource('attendance', 'AttendanceController');

Route::get('in_progress', 'HomeController@in_progress');
Route::get('contact', 'HomeController@contact');
Route::get('info', 'HomeController@info');
Route::get('manual', 'HomeController@manual');
Route::get('scholarships', 'HomeController@scholarships');

//Sessions
Route::get('sessions/create/{planning_id}', 'SessionController@create');
Route::resource('sessions', 'SessionController', ['except' => ['create']]);

//Reports
Route::get('getReports/{user_id}', 'ReportsController@getReports');
Route::resource('reports', 'ReportsController');

Route::group(array('prefix' => 'api', 'middleware' => ['auth']), function()
{
    Route::get('/insert-score/', function(\Illuminate\Http\Request $request){
        $user = \App\User::find($request->id);
        $user->score = $request->score;
        $user->pay = $user->score + $user->average;
        $user->save();

        return response()->json(["next" => $user->score]);
    });
});


