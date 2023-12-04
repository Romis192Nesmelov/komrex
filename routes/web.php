<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
use \App\Http\Controllers\ProjectsController;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminQuotesController;
use App\Http\Controllers\Admin\AdminContentController;
use App\Http\Controllers\Admin\AdminSolutionsController;
use App\Http\Controllers\Admin\AdminConsultingController;
use App\Http\Controllers\Admin\AdminValuesController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\AdminProjectsController;
use App\Http\Controllers\Admin\AdminPartnersController;
use App\Http\Controllers\Admin\AdminRequisitesController;
use App\Http\Controllers\Admin\AdminEventsController;
use App\Http\Controllers\Admin\AdminTechnicController;
use Illuminate\Support\Facades\Route;

Route::controller(BaseController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(FeedbackController::class)->group(function () {
    Route::post('/callback', 'callback')->name('callback');
    Route::post('/sign-up', 'signUp')->name('sign_up');
});


Route::get('/login', function () {return view('admin.login');})->name('login');
Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/get-project', ProjectsController::class)->name('get_project');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {

    Route::controller(AdminBaseController::class)->group(function () {
        Route::get('/', 'home')->name('home');
    });

    Route::controller(AdminUsersController::class)->group(function () {
        Route::get('/users/{slug?}', 'users')->name('users');
        Route::post('/edit-user', 'editUser')->name('edit_user');
        Route::get('/delete-user', 'deleteUser')->name('delete_user');
    });

    Route::controller(AdminQuotesController::class)->group(function () {
        Route::get('/quotes', 'quotes')->name('quotes');
        Route::post('/edit-quote', 'editQuote')->name('edit_quote');
    });

    Route::controller(AdminContentController::class)->group(function () {
        Route::get('/contents', 'contents')->name('contents');
        Route::post('/edit-content', 'editContent')->name('edit_content');
    });

    Route::controller(AdminSolutionsController::class)->group(function () {
        Route::get('/solutions/{slug?}', 'solutions')->name('solutions');
        Route::post('/edit-solution', 'editSolution')->name('edit_solution');
        Route::post('/delete-solution', 'deleteSolution')->name('delete_solution');
    });

    Route::controller(AdminConsultingController::class)->group(function () {
        Route::get('/consultings', 'consultings')->name('consultings');
        Route::post('/edit-consulting-content', 'editConsultingContent')->name('edit_consulting_content');
        Route::post('/edit-consulting', 'editConsulting')->name('edit_consulting');
    });

    Route::controller(AdminValuesController::class)->group(function () {
        Route::get('/values/{slug?}', 'values')->name('values');
        Route::post('/edit-value', 'editValue')->name('edit_value');
        Route::post('/delete-value', 'deleteValue')->name('delete_value');
    });

    Route::controller(AdminTeamController::class)->group(function () {
        Route::get('/participants/{slug?}', 'participants')->name('participants');
        Route::post('/edit-participant', 'editParticipant')->name('edit_participant');
        Route::post('/delete-participant', 'deleteParticipant')->name('delete_participant');
    });

    Route::controller(AdminProjectsController::class)->group(function () {
        Route::get('/project-types/{slug?}', 'projectTypes')->name('project_types');
        Route::post('/edit-project-type', 'editProjectType')->name('edit_project_type');
        Route::post('/delete-project-type', 'deleteProjectType')->name('delete_project_type');

        Route::get('/projects/{slug?}', 'projects')->name('projects');
        Route::post('/edit-project', 'editProject')->name('edit_project');
        Route::post('/delete-project', 'deleteProject')->name('delete_project');
        Route::post('/add-project-image', 'addProjectImage')->name('add_project_image');
        Route::post('/delete-project-image', 'deleteProjectImage')->name('delete_project_image');
    });

    Route::controller(AdminPartnersController::class)->group(function () {
        Route::get('/partners/{slug?}', 'partners')->name('partners');
        Route::post('/edit-partner', 'editPartner')->name('edit_partner');
        Route::post('/delete-partner', 'deletePartner')->name('delete_partner');
    });

    Route::controller(AdminRequisitesController::class)->group(function () {
        Route::get('/requisites', 'requisites')->name('requisites');
        Route::post('/edit-requisites', 'editRequisites')->name('edit_requisites');
    });

    Route::controller(AdminEventsController::class)->group(function () {
        Route::get('/events/{slug?}', 'events')->name('events');
        Route::post('/edit-event', 'editEvent')->name('edit_event');
        Route::post('/delete-event', 'deleteEvent')->name('delete_event');
        Route::post('/delete-event-person', 'deleteEventPerson')->name('delete_event_person');
    });

    Route::controller(AdminTechnicController::class)->group(function () {
        Route::get('/technic-types/{slug?}', 'technicTypes')->name('technic_types');
        Route::post('/edit-technic-type', 'editTechnicType')->name('edit_technic_type');
        Route::post('/delete-technic-type', 'deleteTechnicType')->name('delete_technic_type');

        Route::get('/technics/{slug?}', 'technics')->name('technics');
        Route::post('/edit-technic', 'editTechnic')->name('edit_technic');
        Route::post('/delete-technic', 'deleteTechnic')->name('delete_technic');
    });
});
