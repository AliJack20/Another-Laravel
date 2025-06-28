<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

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




Route::get('/', function () {
    return view('home');
});


//index
Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->simplePaginate(2);
    return view('jobs.index', [

        'jobs'=> $jobs
    ]);
});

//create
Route::get('/jobs/create', function(){
    return view('jobs.create');

});

//show
Route::get('/jobs/{id}', function ($id) {
    

    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
    
});

//stores
Route::post('/jobs', function() {
    
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']   ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id'=>'1'
    ]);

    return redirect('/jobs');

});

//Edit
Route::get('/jobs/{id}/edit', function ($id) {
    

    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
    
});

//Update
Route::patch('/jobs/{id}', function ($id) {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']   ]);

    $job =Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('jobs/' . $job->id);

    
});

//Destroy
Route::delete('/jobs/{id}', function ($id) {

    $job = Job::findOrFail($id);
    $job->delete();

    return redirect('jobs');

    
    
});



Route::get('/contact', function () {
    return view('contact');
});

