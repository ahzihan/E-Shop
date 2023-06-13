<?php

use App\Http\Controllers\QuerybuilderController;
use Illuminate\Support\Facades\Route;


Route::get('/', [QuerybuilderController::class, 'RetrievingAllRows']);
Route::get('/single/{id}', [QuerybuilderController::class, 'RetrievingSingleRowById']);
Route::get('/column', [QuerybuilderController::class, 'RetrievingColumnValues']);
Route::get('/aggregate', [QuerybuilderController::class, 'Aggregates']);
Route::get('/select', [QuerybuilderController::class, 'SelectClause']);
Route::get('/distinct', [QuerybuilderController::class, 'SelectDistinct']);
Route::get('/innerJoin', [QuerybuilderController::class, 'InnerJoin']);
Route::get('/leftJoin', [QuerybuilderController::class, 'LeftJoin']);
Route::get('/rightJoin', [QuerybuilderController::class, 'RightJoin']);
Route::get('/crossJoin', [QuerybuilderController::class, 'CrossJoin']);
Route::get('/advanceJoin', [QuerybuilderController::class, 'AdvancedJoin']);
Route::get('/union', [QuerybuilderController::class, 'Union']);
Route::get('/whereClause', [QuerybuilderController::class, 'BasicWhereClauses']);
