<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
use \App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::controller(BaseController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(FeedbackController::class)->group(function () {
    Route::post('/callback', 'callback')->name('callback');
});


Route::get('/login', function () {return view('admin.login');})->name('login');
Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/get-project', ProjectsController::class)->name('get_project');

Route::prefix('admin')->middleware(['auth'])->controller(AdminController::class)->name('admin.')->group(function () {
    Route::get('/', 'home')->name('home');

    Route::get('/users/{slug?}', 'users')->name('users');
    Route::post('/edit-user', 'editUser')->name('edit_user');
    Route::get('/delete-user', 'deleteUser')->name('delete_user');

    Route::get('/quotes', 'quotes')->name('quotes');
    Route::post('/edit-quote', 'editQuote')->name('edit_quote');

    Route::get('/contents', 'contents')->name('contents');
    Route::post('/edit-content', 'editContent')->name('edit_content');

    Route::get('/solutions/{slug?}', 'solutions')->name('solutions');
    Route::post('/edit-solution', 'editSolution')->name('edit_solution');
    Route::post('/delete-solution', 'deleteSolution')->name('delete_solution');

    Route::get('/consultings', 'consultings')->name('consultings');
    Route::post('/edit-consulting-content', 'editConsultingContent')->name('edit_consulting_content');
    Route::post('/edit-consulting', 'editConsulting')->name('edit_consulting');

    Route::get('/values/{slug?}', 'values')->name('values');
    Route::post('/edit-value', 'editValue')->name('edit_value');
    Route::post('/delete-value', 'deleteValue')->name('delete_value');

    Route::get('/project-types/{slug?}', 'projectTypes')->name('project_types');
    Route::post('/edit-project-type', 'editProjectType')->name('edit_projects_type');
    Route::post('/delete-project-type', 'deleteProjectType')->name('delete_project_type');

    Route::get('/projects/{slug?}', 'projects')->name('projects');
    Route::post('/edit-project', 'editProject')->name('edit_project');
    Route::post('/delete-project', 'deleteProject')->name('delete_project');
    Route::post('/delete-project', 'deleteProject')->name('delete_project');
    Route::post('/add-project-image', 'addProjectImage')->name('add_project_image');
    Route::post('/delete-project-image', 'deleteProjectImage')->name('delete_project_image');

    Route::get('/partners/{slug?}', 'partners')->name('partners');
    Route::post('/edit-partner', 'editPartner')->name('edit_partner');
    Route::post('/delete-partner', 'deletePartner')->name('delete_partner');

    Route::get('/requisites', 'requisites')->name('requisites');
    Route::post('/edit-requisites', 'editRequisites')->name('edit_requisites');

    Route::get('/participants/{slug?}', 'participants')->name('participants');
    Route::post('/edit-participant', 'editParticipant')->name('edit_participant');
    Route::post('/delete-participant', 'deleteParticipant')->name('delete_participant');
});
