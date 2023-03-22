<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Organizer;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('organizer/create', function(Request $request) {
    $organizer = new Organizer;
    //$organizer->name = $request->name;
    //$organizer->is_draft = $request->is_draft;
    $organizer->fill($request->all());
    $organizer->save();

    return $organizer;
});

Route::put('/organizer/{id}', function(Request $request, $id) {

    $organizer = Organizer::find($id);
    $organizer->first_name = 'Kiko';
    $organizer->save();

    return $organizer;
});

Route::delete('/organizer/{id}', function(Request $request, $id) {

    $organizer = Organizer::find($id);
    $organizer->delete();

    return $organizer;
});

Route::get('organizer', function() {
    $organizers = Organizer::with('events')->get();
    return $organizers;
});
