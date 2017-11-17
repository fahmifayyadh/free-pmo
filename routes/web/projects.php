<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Projects'], function () {
    /**
     * Projects Routes
     */
    Route::get('projects/{id}/delete', ['as' => 'projects.delete', 'uses' => 'ProjectsController@delete']);
    Route::get('projects/{id}/jobs-export/{type?}', ['as' => 'projects.jobs-export', 'uses' => 'ProjectsController@jobsExport']);
    Route::get('projects/{id}/subscriptions', ['as' => 'projects.subscriptions', 'uses' => 'ProjectsController@subscriptions']);
    Route::patch('projects/{id}/status-update', ['as' => 'projects.status-update', 'uses' => 'ProjectsController@statusUpdate']);
    Route::resource('projects', 'ProjectsController');

    /**
     * Project Payments Routes
     */
    Route::get('projects/{id}/payments', ['as' => 'projects.payments', 'uses' => 'ProjectsController@payments']);

    /**
     * Project Fees Routes
     */
    Route::get('projects/{project}/fees/create', ['as' => 'projects.fees.create', 'uses' => 'FeesController@create']);
    Route::post('projects/{project}/fees/store', ['as' => 'projects.fees.store', 'uses' => 'FeesController@store']);

    /**
     * Project Invoices Routes
     */
    Route::get('projects/{project}/invoices', ['as' => 'projects.invoices', 'uses' => 'InvoicesController@index']);

    /**
     * Project Jobs Routes
     */
    Route::get('projects/{id}/jobs/create', ['as' => 'projects.jobs.create', 'uses' => 'JobsController@create']);
    Route::post('projects/{id}/jobs', ['as' => 'projects.jobs.store', 'uses' => 'JobsController@store']);
    Route::get('projects/{id}/jobs/add-from-other-project', ['as' => 'projects.jobs.add-from-other-project', 'uses' => 'JobsController@addFromOtherProject']);
    Route::post('projects/{id}/jobs/store-from-other-project', ['as' => 'projects.jobs.store-from-other-project', 'uses' => 'JobsController@storeFromOtherProject']);
    Route::get('jobs/{id}/delete', ['as' => 'jobs.delete', 'uses' => 'JobsController@delete']);
    Route::post('jobs/{id}/tasks-reorder', ['as' => 'jobs.tasks-reorder', 'uses' => 'JobsController@tasksReorder']);
    Route::get('projects/{project}/jobs', ['as' => 'projects.jobs.index', 'uses' => 'JobsController@index']);
    Route::post('projects/{id}/jobs-reorder', ['as' => 'projects.jobs-reorder', 'uses' => 'ProjectsController@jobsReorder']);
    Route::resource('jobs', 'JobsController', ['except' => ['index', 'create', 'store']]);

    /**
     * Tasks Routes
     */
    Route::get('jobs/{id}/tasks/create', ['as' => 'tasks.create', 'uses' => 'TasksController@create']);
    Route::post('jobs/{id}/tasks', ['as' => 'tasks.store', 'uses' => 'TasksController@store']);
    Route::patch('task/{id}', ['as' => 'tasks.update', 'uses' => 'TasksController@update']);
    Route::delete('task/{id}', ['as' => 'tasks.destroy', 'uses' => 'TasksController@destroy']);

    /**
     * Files Routes
     */
    Route::get('projects/{project}/files', ['as' => 'projects.files', 'uses' => 'FilesController@index']);
    Route::post('files/{fileable}', ['as' => 'files.upload', 'uses' => 'FilesController@create']);
    Route::get('files/{file}', ['as' => 'files.download', 'uses' => 'FilesController@show']);
    Route::patch('files/{file}', ['as' => 'files.update', 'uses' => 'FilesController@update']);
});

Route::group(['middleware' => ['web', 'auth']], function () {

    /**
     * Unfinished Job List
     */
    Route::get('jobs', ['as' => 'jobs.index', 'uses' => 'JobsController@index']);
});
