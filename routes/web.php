<?php

use App\Http\Controllers\PairController;
use App\Http\Controllers\PigeonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');

    Route::get('/pigeons', [PigeonController::class, 'index'])->name('pigeons.index');
    Route::get('/view-pigeon/{pigeon}', [PigeonController::class, 'view'])->name('pigeons.view');
    Route::get('/create-pigeon', [PigeonController::class, 'create'])->name('pigeons.create');
    Route::post('/create-pigeon', [PigeonController::class, 'store'])->name('pigeons.store');
    Route::put('/update-pigeon/{pigeon}', [PigeonController::class, 'update'])->name('pigeons.update');
    Route::delete('/delete-pigeon/{pigeon}', [PigeonController::class, 'destroy'])->name('pigeons.destroy');

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
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
