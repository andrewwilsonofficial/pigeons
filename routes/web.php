<?php

use App\Http\Controllers\AdminAdminController;
use App\Http\Controllers\AdminPlanController;
use App\Http\Controllers\AdminSubscriptionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalEntryController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PairController;
use App\Http\Controllers\PigeonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlanController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsSubscribed;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/plans/subscribe/{plan}', [PlanController::class, 'subscribe'])
        ->name('plans.subscribe')
        ->where('plan', '^(?!1$).*$');
    Route::post('/plans/subscribe/{plan}', [PlanController::class, 'processSubscription'])
        ->name('plans.processSubscription')
        ->where('plan', '^(?!1$).*$');
    Route::get('/plans/thank-you/{planSubscriptionRequest}', [PlanController::class, 'thankYou'])
        ->name('plans.thankYou');

    Route::middleware([IsSubscribed::class])->group(function () {
        Route::get('/pigeons', [PigeonController::class, 'index'])->name('pigeons.index');
        Route::get('/view-pigeon/{pigeon}', [PigeonController::class, 'view'])->name('pigeons.view');
        Route::get('/create-pigeon', [PigeonController::class, 'create'])->name('pigeons.create');
        Route::post('/create-pigeon', [PigeonController::class, 'store'])->name('pigeons.store');
        Route::get('/edit-pigeon/{pigeon}', [PigeonController::class, 'edit'])->name('pigeons.edit');
        Route::put('/update-pigeon/{pigeon}', [PigeonController::class, 'update'])->name('pigeons.update');
        Route::get('/pigeon-attachments/{pigeon}', [PigeonController::class, 'attachments'])->name('pigeons.attachments');
        Route::post('/pigeon-attachments/{pigeon}', [PigeonController::class, 'updateAttachments'])->name('pigeons.updateAttachments');
        Route::delete('/delete-pigeon-attachment/{attachment}', [PigeonController::class, 'deleteAttachment'])->name('pigeons.deleteAttachment');
        Route::get('/attachment-cover/{attachment}', [PigeonController::class, 'attachmentCover'])->name('pigeons.attachmentCover');
        Route::delete('/delete-pigeon/{pigeon}', [PigeonController::class, 'destroy'])->name('pigeons.destroy');
        Route::get('/pedigree/{pigeon}', [PigeonController::class, 'pedigree'])->name('pigeons.pedigree');
        Route::post('/send-pigeon-link/{pigeon}', [PigeonController::class, 'sendPigeonLink'])->name('pigeons.sendPigeonLink');

        Route::get('/statistics', [PigeonController::class, 'statistics'])->name('pigeons.statistics');
        Route::get('/public-pigeons', [PigeonController::class, 'publicPigeons'])->name('pigeons.public');

        Route::get('/seasons', [SeasonController::class, 'seasons'])->name('seasons');
        Route::get('/seasons/create', [SeasonController::class, 'createSeason'])->name('seasons.create');
        Route::post('/seasons/create', [SeasonController::class, 'storeSeason'])->name('seasons.store');
        Route::get('/season/{season}', [SeasonController::class, 'season'])->name('season');
        Route::get('/season/{season}/edit', [SeasonController::class, 'editSeason'])->name('seasons.edit');
        Route::put('/season/{season}/edit', [SeasonController::class, 'updateSeason'])->name('seasons.update');
        Route::delete('/season/{season}/delete', [SeasonController::class, 'destroySeason'])->name('seasons.destroy');

        Route::get('/pairs', [PairController::class, 'pairs'])->name('pairs');
        Route::get('/pairs/create', [PairController::class, 'createPair'])->name('pairs.create');
        Route::post('/pairs/create', [PairController::class, 'storePair'])->name('pairs.store');
        Route::get('/pair/{pair}', [PairController::class, 'pair'])->name('pair');
        Route::get('/pair/{pair}/edit', [PairController::class, 'editPair'])->name('pairs.edit');
        Route::put('/pair/{pair}/edit', [PairController::class, 'updatePair'])->name('pairs.update');
        Route::delete('/pair/{pair}/delete', [PairController::class, 'destroyPair'])->name('pairs.destroy');

        Route::get('/teams', [TeamController::class, 'teams'])->name('teams');
        Route::get('/teams/create', [TeamController::class, 'createTeam'])->name('teams.create');
        Route::post('/teams/create', [TeamController::class, 'storeTeam'])->name('teams.store');
        Route::get('/team/{team}', [TeamController::class, 'team'])->name('team');
        Route::get('/team/{team}/edit', [TeamController::class, 'editTeam'])->name('teams.edit');
        Route::put('/team/{team}/edit', [TeamController::class, 'updateTeam'])->name('teams.update');
        Route::delete('/team/{team}/delete', [TeamController::class, 'destroyTeam'])->name('teams.destroy');

        Route::get('/races', [RaceController::class, 'races'])->name('races');
        Route::get('/races/create', [RaceController::class, 'createRace'])->name('races.create');
        Route::post('/races/create', [RaceController::class, 'storeRace'])->name('races.store');
        Route::get('/race/{race}', [RaceController::class, 'race'])->name('race');
        Route::get('/race/{race}/edit', [RaceController::class, 'editRace'])->name('races.edit');
        Route::put('/race/{race}/edit', [RaceController::class, 'updateRace'])->name('races.update');
        Route::delete('/race/{race}/delete', [RaceController::class, 'destroyRace'])->name('races.destroy');
        Route::get('/races-tools', [RaceController::class, 'tools'])->name('race.tools');

        Route::get('/stations', [StationController::class, 'stations'])->name('stations');
        Route::get('/stations/create', [StationController::class, 'createStation'])->name('stations.create');
        Route::post('/stations/create', [StationController::class, 'storeStation'])->name('stations.store');
        Route::get('/station/{station}/edit', [StationController::class, 'editStation'])->name('stations.edit');
        Route::put('/station/{station}/edit', [StationController::class, 'updateStation'])->name('stations.update');
        Route::delete('/station/{station}/delete', [StationController::class, 'destroyStation'])->name('stations.destroy');
        Route::get('/my-loft', [StationController::class, 'myLoft'])->name('stations.myloft');
        Route::post('/my-loft', [StationController::class, 'storeMyLoft'])->name('stations.storeMyLoft');

        Route::get('/journal-entries', [JournalEntryController::class, 'journalEntries'])->name('journal-entries');
        Route::get('/journal-entries/create', [JournalEntryController::class, 'createJournalEntry'])->name('journal-entries.create');
        Route::post('/journal-entries/create', [JournalEntryController::class, 'storeJournalEntry'])->name('journal-entries.store');
        Route::get('/journal-entry/{journalEntry}/edit', [JournalEntryController::class, 'editJournalEntry'])->name('journal-entries.edit');
        Route::put('/journal-entry/{journalEntry}/edit', [JournalEntryController::class, 'updateJournalEntry'])->name('journal-entries.update');
        Route::delete('/journal-entry/{journalEntry}/delete', [JournalEntryController::class, 'destroyJournalEntry'])->name('journal-entries.destroy');

        Route::get('/medications', [MedicationController::class, 'medications'])->name('medications');
        Route::get('/medications/create', [MedicationController::class, 'createMedication'])->name('medications.create');
        Route::post('/medications/create', [MedicationController::class, 'storeMedication'])->name('medications.store');
        Route::get('/medication/{medication}/edit', [MedicationController::class, 'editMedication'])->name('medications.edit');
        Route::put('/medication/{medication}/edit', [MedicationController::class, 'updateMedication'])->name('medications.update');
        Route::delete('/medication/{medication}/delete', [MedicationController::class, 'destroyMedication'])->name('medications.destroy');

        Route::get('/comments/{type}', [CommentController::class, 'comments'])->where('type', 'pigeon|pair|team')->name('comments');
        Route::post('/comments/{type}/{id}', [CommentController::class, 'storeComment'])->where('type', 'pigeon|pair|team')->name('comments.store');
        Route::put('/update-comment', [CommentController::class, 'updateComment'])->name('comments.update');
        Route::delete('/comments/{comment}', [CommentController::class, 'destroyComment'])->name('comments.destroy');

        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
        Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
        Route::post('/contacts/create', [ContactController::class, 'store'])->name('contacts.store');
        Route::get('/contact/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::put('/contact/{contact}/edit', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });

    Route::middleware([IsAdmin::class])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/users', [AdminUserController::class, 'users'])->name('admin.users');
            Route::get('/log-in-as-user/{user}', [AdminUserController::class, 'logInAsUser'])->name('admin.users.logInAsUser');
            Route::delete('/user/{user}/delete', [AdminUserController::class, 'destroyUser'])->name('admin.users.destroy');

            Route::get('/plans', [AdminPlanController::class, 'plans'])->name('admin.plans');
            Route::get('/plan/{plan}/edit', [AdminPlanController::class, 'editPlan'])->name('admin.plans.edit');
            Route::put('/plan/{plan}/edit', [AdminPlanController::class, 'updatePlan'])->name('admin.plans.update');

            Route::get('/subscriptions', [AdminSubscriptionController::class, 'subscriptions'])->name('admin.subscriptions');
            Route::post('/subscription/store', [AdminSubscriptionController::class, 'storeSubscription'])->name('admin.subscriptions.store');
            Route::delete('/subscription/{subscriptionLog}/delete', [AdminSubscriptionController::class, 'destroySubscription'])->name('admin.subscriptions.destroy');

            Route::delete('/subscription-request/{planSubscriptionRequest}/delete', [AdminSubscriptionController::class, 'destroySubscriptionRequest'])->name('admin.subscription-requests.destroy');
            Route::get('/subscription-request/{planSubscriptionRequest}', [AdminSubscriptionController::class, 'viewSubscriptionRequest'])->name('admin.subscription-requests.view');
            Route::post('/subscription-request/{planSubscriptionRequest}/approve', [AdminSubscriptionController::class, 'approveSubscriptionRequest'])->name('admin.subscription-requests.approve');
            Route::post('/subscription-request/{planSubscriptionRequest}/reject', [AdminSubscriptionController::class, 'rejectSubscriptionRequest'])->name('admin.subscription-requests.reject');

            Route::get('/admins', [AdminAdminController::class, 'admins'])->name('admin.admins');
            Route::get('/admin/create', [AdminAdminController::class, 'createAdmin'])->name('admin.admins.create');
            Route::post('/admin/create', [AdminAdminController::class, 'storeAdmin'])->name('admin.admins.store');
            Route::get('/admin/{user}/edit', [AdminAdminController::class, 'editAdmin'])->name('admin.admins.edit');
            Route::put('/admin/{user}/edit', [AdminAdminController::class, 'updateAdmin'])->name('admin.admins.update');
            Route::delete('/admin/{admin}/delete', [AdminAdminController::class, 'destroyAdmin'])->name('admin.admins.destroy');
        });
    });

    Route::get('/return-to-admin', function () {
        if (session()->has('admin_user_id')) {
            auth()->loginUsingId(session()->pull('admin_user_id'));

            return redirect()->route('home');
        }

        return redirect()->route('home');
    })->name('returnToAdmin');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('public-pigeon/{pigeon}', [PigeonController::class, 'publicPigeon'])->name('pigeons.publicPigeon');

require __DIR__ . '/auth.php';
