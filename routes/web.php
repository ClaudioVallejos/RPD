<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Auth::routes();
Route::get('/index', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    
    
    //Roles
    //ruta 		//nombre de ruta 	//Permiso

    Route::post('/roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:users.index');
    Route::get('/roles', 'RoleController@index')->name('roles.index')->middleware('permission:users.index');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:users.index');
    Route::put('/roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:users.index');
    Route::get('/roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:users.index');
    Route::delete('/roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:users.index');
    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:users.index');

    //Users
    //ruta 		//nombre de ruta 	//Permiso

    Route::get('/users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create')->middleware('permission:users.index');
    Route::post('/users/store', 'UserController@store')->name('users.store')->middleware('permission:users.index');

    Route::put('/users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.index');
    Route::get('/users/{user}', 'UserController@show')->name('users.show')->middleware('permission:users.index');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.index');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.index');
    

  //Auditoria
    Route::get('/auditoria/rejected/', 'auditoriaController@index')->name('auditoria.index')->middleware('permission:auditoria.index');


    Route::get('/auditoria/rejectedLote/', 'auditoriaController@indexLote')->name('auditoria.index')->middleware('permission:auditoria.index');
    

    Route::get('/auditoria/rejectedReception/', 'auditoriaController@indexReception')->name('auditoria.index')->middleware('permission:auditoria.index');

    
    Route::get('/auditoria/rejected/{id}', 'auditoriaController@update')->name('auditoria.update')->middleware('permission:auditoria.index');
    
    Route::get('/auditoria/rejectedLote/{id}', 'auditoriaController@updateLote')->name('auditoria.update')->middleware('permission:auditoria.index');
    

    Route::get('/auditoria/rejectedReception/{id}', 'auditoriaController@updateReception')->name('auditoria.update')->middleware('permission:auditoria.index');


    
    //Supplies
    //ruta 		//nombre de ruta 	//Permiso

    Route::get('/supplies', 'SuppliesController@index')->name('admin.supplies.index')->middleware('permission:admin.supplies.index');
    Route::get('/supplies/create', 'SuppliesController@create')->name('admin.supplies.create')->middleware('permission:admin.supplies.index');
    Route::post('/supplies/store', 'SuppliesController@store')->name('admin.supplies.store')->middleware('permission:admin.supplies.index');

    Route::put('/supplies/{supplie}', 'SuppliesController@update')->name('admin.supplies.update')->middleware('permission:admin.supplies.index');
    Route::get('/supplies/{supplie}', 'SuppliesController@show')->name('admin.supplies.show')->middleware('permission:admin.supplies.index');
    Route::delete('/supplies/{supplie}', 'SuppliesController@destroy')->name('admin.supplies.destroy')->middleware('permission:admin.supplies.index');
    Route::get('/supplies/{supplie}/edit', 'SuppliesController@edit')->name('admin.supplies.edit')->middleware('permission:admin.supplies.index');

  
    //Rechazado
    //ruta 		//focod de la ruta	//Permiso


    Route::post('/rejecteds/store', 'MotivorejectedController@store')->name('admin.rejecteds.store')->middleware('permission:admin.supplies.index');

    Route::get('/rejecteds', 'MotivorejectedController@index')->name('admin.rejecteds.index')->middleware('permission:admin.supplies.index');

    Route::get('/rejecteds/create', 'MotivorejectedController@create')->name('admin.rejecteds.create')->middleware('permission:admin.supplies.index');

    Route::put('/rejecteds/{motivorejected}', 'MotivorejectedController@update')->name('admin.rejecteds.update')->middleware('permission:admin.supplies.index');

    Route::get('/rejecteds/{motivorejected}', 'MotivorejectedController@show')->name('admin.rejecteds.show')->middleware('permission:admin.supplies.index');

    Route::delete('/rejecteds/{motivorejected}', 'MotivorejectedController@destroy')->name('admin.rejecteds.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/rejecteds/{motivorejected}/edit', 'MotivorejectedController@edit')->name('admin.rejecteds.edit')->middleware('permission:admin.supplies.index');

    //Reception
    //ruta 		//nombre de ruta 	//Permiso
    Route::post('/receptions/store', 'ReceptionController@store')->name('receptions.store')
        ->middleware('permission:receptions.index');

            Route::get('/receptions/delete', 'ReceptionController@delete')->name('receptions.delete')
        ->middleware('permission:receptions.index');    

    Route::get('/receptions', 'ReceptionController@index')->name('receptions.index')
        ->middleware('permission:receptions.index');


    Route::get('/inprocess', 'ReceptionController@inprocess')->name('receptions.inprocess')->middleware('permission:receptions.index'); 

    Route::get('/receptions/create', 'ReceptionController@create')->name('receptions.create')
        ->middleware('permission:receptions.index');

    Route::put('/receptions/{reception}', 'ReceptionController@update')->name('receptions.update')
        ->middleware('permission:receptions.index');

    Route::get('/receptions/{reception}', 'ReceptionController@show')->name('receptions.show')
        ->middleware('permission:receptions.index');

    Route::delete('/receptions/{reception}', 'ReceptionController@destroy')->name('receptions.destroy')
        ->middleware('permission:receptions.index');

    Route::get('/receptions/{reception}/edit', 'ReceptionController@edit')->name('receptions.edit')
        ->middleware('permission:receptions.index');

    Route::get('receptionChange', 'ReceptionController@ChangeStatusTrue')->name('receptions.change')
        ->middleware('permission:receptions.index');

    Route::get('reception-list', 'ReceptionController@getData') ->middleware('permission:receptions.index');




    Route::get('lotes-list', 'LoteController@getData');
    Route::get('subprocess-list', 'SubProcessController@getData');
    Route::get('reprocess-list', 'ReprocessController@getData');
    Route::get('subreprocess-list', 'SubReprocessController@getData');
    Route::get('resubprocess-list', 'SubReProcessController@getData');
    Route::get('process-list', 'ProcessController@getData');

    // START reportes

    // Recepcion View
    Route::get('/receptionsdaily', 'ReceptionController@receptionsdaily')->name('receptions.receptionsdaily')->middleware('permission:receptions.receptionsdaily');  

    Route::get('/receptionsperfruit', 'ReceptionController@receptionsperfruit')->name('receptions.receptionsperfruit')->middleware('permission:receptions.receptionsdaily');  

    Route::get('/receptionsperproductor', 'ReceptionController@receptionsperproductor')->name('receptions.receptionsperproductor')->middleware('permission:receptions.receptionsdaily');  

    // Recepcion Search

    Route::post('receptionproductorsearch', 'ReceptionController@productortotal')->name('receptionproductor');
    Route::post('receptionfruitsearch', 'ReceptionController@fruittotal')->name('receptionfruit');
    Route::post('receptiondailysearch', 'ReceptionController@dailytotal')->name('receptiondailysearch');

    // Proceso View
    Route::get('/processDaily', 'ReportesController@reporteProcesoDaily')->name('reporteProcesoDaily')->middleware('permission:receptions.receptionsdaily');  

    Route::get('/processFruit', 'ReportesController@reporteProcesoFruit')->name('reporteProcesoFruit')->middleware('permission:receptions.receptionsdaily');  

    Route::get('/processProvider', 'ReportesController@reporteProcesoProvider')->name('reporteProcesoProvider')->middleware('permission:receptions.receptionsdaily');  

    // Proceso search
    Route::post('reporteProcesoDailySearch', 'ReportesController@reporteProcesoDailySearch')->name('reporteProcesoDailySearch');
    Route::post('reporteProcesoFruitSearch', 'ReportesController@reporteProcesoFruitSearch')->name('reporteProcesoFruitSearch');
    Route::post('reporteProcesoProviderSearch', 'ReportesController@reporteProcesoProviderSearch')->name('reporteProcesoProviderSearch');

    //Despacho View
    Route::get('/dispatchDaily', 'ReportesController@reporteDespachoDaily')->name('reporteDespachoDaily')->middleware('permission:receptions.receptionsdaily');  


    Route::get('/dispatchFruit', 'ReportesController@reporteDespachoFruit')->name('reporteDespachoFruit')->middleware('permission:receptions.receptionsdaily');  

    Route::get('/dispatchProvider', 'ReportesController@reporteDespachoProvider')->name('reporteDespachoProvider')->middleware('permission:receptions.receptionsdaily');  

    //Despacho Search
    Route::post('/dispatchDailySearch', 'ReportesController@reporteDespachoDailySearch')->name('reporteDespachoDailySearch')->middleware('permission:receptions.receptionsdaily');  

    Route::post('/dispatchFruitSearch', 'ReportesController@reporteDespachoFruitSearch')->name('reporteDespachoFruitSearch')->middleware('permission:receptions.receptionsdaily');  

    Route::post('/dispatchProviderSearch', 'ReportesController@reporteDespachoProviderSearch')->name('reporteDespachoProviderSearch')->middleware('permission:receptions.receptionsdaily');  

    Route::get('/camaraFruit', 'ReportesController@reporteCamaraFruit')->name('reporteCamaraFruit')->middleware('permission:receptions.receptionsdaily');  
 Route::post('/camaraFruitSearch', 'ReportesController@reporteCamaraFruitSearch')->name('reporteCamaraFruitSearch')->middleware('permission:receptions.receptionsdaily');  

    // END REPORTES

    Route::get('/printreception/{reception}', 'ReceptionController@print')->name('receptions.print');
    Route::get('/printdispatch/{dispatch}', 'DispatchController@print')->name('dispatchs.print');
    Route::get('/printsubprocess/{subprocess}', 'SubProcessController@print')->name('subprocess.print');
    Route::get('/printsubreprocess/{subreprocess}', 'SubReprocessController@print')->name('subreprocess.print');
    Route::get('/printlote/{lote}', 'LoteController@print')->name('lotes.print');

    //Consulta Ajax Select

    //Process
    //ruta 		//referencia de la ruta 	//con la función...
     Route::get('/processes/delete', 'ProcessController@delete')->name('process.processes.delete')
        ->middleware('permission:receptions.delete');  

    Route::get('/processes/create', 'ProcessController@create')->name('process.processes.create')->middleware('permission:process.processes.index');

    Route::post('/processes/store', 'ProcessController@store')->name('process.processes.store')->middleware('permission:process.processes.index');

    Route::get('/processes', 'ProcessController@index')->name('process.processes.index')->middleware('permission:process.processes.index');

    Route::put('/processes/{process}', 'ProcessController@update')->name('process.processes.update')->middleware('permission:process.processes.index');

    Route::get('/processes/{process}', 'ProcessController@show')->name('process.processes.show')->middleware('permission:process.processes.index');

    Route::delete('/processes/{process}', 'ProcessController@destroy')->name('process.processes.destroy')->middleware('permission:process.processes.index');

    Route::get('/processes/{process}/edit', 'ProcessController@edit')->name('process.processes.edit')->middleware('permission:process.processes.index');

    // reproceso

    Route::get('/reprocesses/create', 'ReprocessController@create')->name('reprocess.reprocesses.create')->middleware('permission:reprocess.reprocesses.index');

    Route::post('/reprocesses/store', 'ReprocessController@store')->name('reprocess.reprocesses.store')->middleware('permission:reprocess.reprocesses.index');

    Route::get('/reprocesses', 'ReprocessController@index')->name('reprocess.reprocesses.index')->middleware('permission:reprocess.reprocesses.index');

    Route::put('/reprocesses/{reprocess}', 'ReprocessController@update')->name('reprocess.reprocesses.update')->middleware('permission:reprocess.reprocesses.index');

    Route::get('/reprocesses/{reprocess}', 'ReprocessController@show')->name('reprocess.reprocesses.show')->middleware('permission:reprocess.reprocesses.index');

    Route::get('/reprocesses/{reprocess}', 'ReprocessController@show')->name('reprocess.reprocesses.show')->middleware('permission:reprocess.reprocesses.index');

   

    Route::get('/reprocesses/{reprocess}/edit', 'ReprocessController@edit')->name('reprocess.reprocesses.edit')->middleware('permission:reprocess.reprocesses.index');

    // resubproceso

    Route::get('/subprocess/delete', 'SubProcessController@delete')->name('subprocess.delete')->middleware('permission:process.processes.index');

      Route::get('/subreprocesses/delete', 'SubReprocessController@delete')->name('subreprocess.delete')
        ->middleware('permission:process.processes.index');
        

    Route::get('/subreprocesses/create/{reprocess_id}', 'SubReprocessController@create')->name('subreprocess.create')->middleware('permission:process.processes.index');

    Route::post('/subreprocesses/store', 'SubReprocessController@store')->name('subreprocess.store')->middleware('permission:process.processes.index');

    Route::get('/subreprocesses', 'SubReprocessController@index')->name('subreprocess.index')->middleware('permission:process.processes.index');

    Route::put('/subreprocesses/{subreprocess}', 'SubReprocessController@update')->name('subreprocess.update')->middleware('permission:process.processes.index');

    Route::get('/subreprocesses/{subreprocess}', 'SubReprocessController@show')->name('subreprocess.show')->middleware('permission:process.processes.index');

    Route::delete('/subreprocesses/{subreprocess}', 'SubReprocessController@destroy')->name('subreprocess.destroy')->middleware('permission:process.processes.index');

    Route::get('/subreprocesses/{subreprocess}/edit', 'SubReprocessController@edit')->name('subreprocess.edit')->middleware('permission:process.processes.index');

    // camarar subreprocess
     Route::get('/camarasubreprocess', 'SubReprocessController@getsubreprocess')->name('subreprocess.getsubreprocess')->middleware('permission:lotes.index');

    // lote
     Route::get('/lotes/delete', 'LoteController@delete')->name('lotes.delete')
        ->middleware('permission:receptions.delete');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('lotes', 'LoteController')->names('lotes')->parameters(['lotes' => 'lote']);

    

    Route::post('/lotescreate', 'LoteController@create')->name('lote.createrial')->middleware('permission:process.processes.index');

    Route::get('/createsearch', 'LoteController@createsearch')->name('lote.createsearch')->middleware('permission:process.processes.index');

    Route::get('/RPcamara', 'SubReProcessController@getData')->name('subreprocess.RPcamara')->middleware('permission:process.processes.index');

    Route::get('/camaralote', 'LoteController@getLotes')->name('Lote.getLotes')->middleware('permission:lotes.index');

    //SubProcess

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('subprocess', 'SubProcessController')->names('subprocess')->parameters(['subprocess' => 'subprocess']);
    });

    Route::get('/subprocess/create/{subprocess}', 'SubProcessController@create')->name('subprocess.create')->middleware('permission:process.processes.index');

    Route::post('/subprocess/store', 'SubProcessController@store')->name('subprocess.store')->middleware('permission:process.processes.index');

    Route::get('/subprocess', 'SubProcessController@index')->name('subprocess.index')->middleware('permission:process.processes.index');

    Route::put('/auditoria/rejected/{subprocess}', 'SubProcessController@update')->name('subprocess.update')->middleware('permission:process.processes.index');

    Route::post('/auditoria/{id}', 'auditoriaController@update')->name('update.auditoria');

    Route::get('/subprocess/{subprocess}', 'SubProcessController@show')->name('subprocess.show')->middleware('permission:process.processes.indexw');

    Route::delete('/subprocess/{subprocess}', 'SubProcessController@destroy')->name('subprocess.destroy')->middleware('permission:process.processes.index');

    Route::get('/subprocess/{subprocess}/edit', 'SubProcessController@edit')->name('subprocess.edit')->middleware('permission:process.processes.index');

    //Proveederoes

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('providers', 'ProviderController')->names('admin.providers')->parameters(['providers' => 'provider']);
    });

    Route::post('/providers/store', 'ProviderController@store')->name('admin.providers.store')->middleware('permission:admin.supplies.index');

    Route::get('/providers', 'ProviderController@index')->name('admin.providers.index')->middleware('permission:admin.supplies.index');

    Route::get('/providers/create', 'ProviderController@create')->name('admin.providers.create')->middleware('permission:admin.supplies.index');

    Route::put('/providers/{provider}', 'ProviderController@update')->name('admin.providers.update')->middleware('permission:admin.supplies.index');

    Route::get('/providers/{provider}', 'ProviderController@show')->name('admin.providers.show')->middleware('permission:admin.supplies.index');

    Route::delete('/providers/{provider}', 'ProviderController@destroy')->name('admin.providers.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/providers/{provider}/edit', 'ProviderController@edit')->name('admin.providers.edit')->middleware('permission:admin.supplies.index');

    //Fruta
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('fruits', 'FruitController')->names('admin.fruits')->parameters(['fruits' => 'fruit']);
    });

    Route::post('/fruits/store', 'FruitController@store')->name('admin.fruits.store')->middleware('permission:admin.supplies.index');

    Route::get('/fruits', 'FruitController@index')->name('admin.fruits.index')->middleware('permission:admin.supplies.index');

    Route::get('/fruits/create', 'FruitController@create')->name('admin.fruits.create')->middleware('permission:admin.supplies.index');

    Route::put('/fruits/{fruit}', 'FruitController@update')->name('admin.fruits.update')->middleware('permission:admin.supplies.index');

    Route::get('/fruits/{fruit}', 'FruitController@show')->name('admin.fruits.show')->middleware('permission:admin.supplies.index');

    Route::delete('/fruits/{fruit}', 'FruitController@destroy')->name('admin.fruits.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/fruits/{fruit}/edit', 'FruitController@edit')->name('admin.fruits.edit')->middleware('permission:admin.supplies.index');

    //Variead de fruta

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('varieties', 'VarietyController')->names('admin.varieties')->parameters(['varieties' => 'variety']);
    });

    Route::post('/varieties/store', 'VarietyController@store')->name('admin.varieties.store')->middleware('permission:admin.supplies.index');

    Route::get('/varieties', 'VarietyController@index')->name('admin.varieties.index')->middleware('permission:admin.supplies.index');

    Route::get('/varieties/create', 'VarietyController@create')->name('admin.varieties.create')->middleware('permission:admin.supplies.index');

    Route::put('/varieties/{variety}', 'VarietyController@update')->name('admin.varieties.update')->middleware('permission:admin.supplies.index');

    Route::get('/varieties/{variety}', 'VarietyController@show')->name('admin.varieties.show')->middleware('permission:admin.supplies.index');

    Route::delete('/varieties/{variety}', 'VarietyController@destroy')->name('admin.varieties.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/varieties/{variety}/edit', 'VarietyController@edit')->name('admin.varieties.edit')->middleware('permission:admin.supplies.index');

    //Formato

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('formats', 'FormatController')->names('admin.formats')->parameters(['formats' => 'format']);
    });

    Route::post('/formats/store', 'FormatController@store')->name('admin.formats.store')->middleware('permission:admin.supplies.index');

    Route::get('/formats', 'FormatController@index')->name('admin.formats.index')->middleware('permission:admin.supplies.index');

    Route::get('/formats/create', 'FormatController@create')->name('admin.formats.create')->middleware('permission:admin.supplies.index');

    Route::put('/formats/{format}', 'FormatController@update')->name('admin.formats.update')->middleware('permission:admin.supplies.index');

    Route::get('/formats/{format}', 'FormatController@show')->name('admin.formats.show')->middleware('permission:admin.supplies.index');

    Route::delete('/formats/{format}', 'FormatController@destroy')->name('admin.formats.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/formats/{format}/edit', 'FormatController@edit')->name('admin.formats.edit')->middleware('permission:admin.supplies.index');

    //Quality

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('quality', 'QualityController')->names('admin.quality')->parameters(['quality' => 'quality']);
    });

    Route::post('/quality/store', 'QualityController@store')->name('admin.quality.store')->middleware('permission:admin.supplies.index');

    Route::get('/quality', 'QualityController@index')->name('admin.quality.index')->middleware('permission:admin.supplies.index');

    Route::get('/quality/create', 'QualityController@create')->name('admin.quality.create')->middleware('permission:admin.supplies.index');

    Route::put('/quality/{quality}', 'QualityController@update')->name('admin.quality.update')->middleware('permission:admin.supplies.index');

    Route::get('/quality/{quality}', 'QualityController@show')->name('admin.quality.show')->middleware('permission:admin.supplies.index');

    Route::delete('/quality/{quality}', 'QualityController@destroy')->name('admin.quality.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/quality/{quality}/edit', 'QualityController@edit')->name('admin.quality.edit')->middleware('permission:admin.supplies.index');

    //Exportadores

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('exporters', 'ExporterController')->names('admin.exporters')->parameters(['exporters' => 'exporter']);
    });

    Route::post('/exporters/store', 'ExporterController@store')->name('admin.exporters.store')->middleware('permission:admin.supplies.index');

    Route::get('/exporters', 'ExporterController@index')->name('admin.exporters.index')->middleware('permission:admin.supplies.index');

    Route::get('/exporters/create', 'ExporterController@create')->name('admin.exporters.create')->middleware('permission:admin.supplies.index');

    Route::put('/exporters/{exporter}', 'ExporterController@update')->name('admin.exporters.update')->middleware('permission:admin.supplies.index');

    Route::get('/exporters/{exporter}', 'ExporterController@show')->name('admin.exporter.show')->middleware('permission:admin.supplies.index');

    Route::delete('/exporter/{exporter}', 'ExporterController@destroy')->name('admin.exporters.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/exporters/{exporter}/edit', 'ExporterController@edit')->name('admin.exporters.edit')->middleware('permission:admin.supplies.index');

    //Season
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('seasons', 'SeasonController')->names('admin.seasons')->parameters(['seasons' => 'season']);
    });

    Route::post('/seasons/store', 'SeasonController@store')->name('admin.seasons.store')->middleware('permission:admin.supplies.index');

    Route::get('/seasons', 'SeasonController@index')->name('admin.seasons.index')->middleware('permission:admin.supplies.index');

    Route::get('/seasons/create', 'SeasonController@create')->name('admin.seasons.create')->middleware('permission:admin.supplies.index');

    Route::put('/seasons/{season}', 'SeasonController@update')->name('admin.seasons.update')->middleware('permission:admin.supplies.index');

    Route::get('/seasons/{season}', 'SeasonController@show')->name('admin.season.show')->middleware('permission:admin.supplies.index');

    Route::delete('/season/{season}', 'SeasonController@destroy')->name('admin.seasons.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/seasons/{season}/edit', 'SeasonController@edit')->name('admin.seasons.edit')->middleware('permission:admin.supplies.index');

    //TipoTransportes
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('tipotransportes', 'TipoTransporteController')->names('admin.tipotransportes')->parameters(['tipotransportes' => 'tipotransporte']);
    });

    Route::post('/tipotransportes/store', 'TipoTransporteController@store')->name('admin.tipotransportes.store')->middleware('permission:admin.supplies.index');

    Route::get('/tipotransportes', 'TipoTransporteController@index')->name('admin.tipotransportes.index')->middleware('permission:admin.supplies.index');

    Route::get('/tipotransportes/create', 'TipoTransporteController@create')->name('admin.tipotransportes.create')->middleware('permission:admin.supplies.index');

    Route::put('/tipotransportes/{tipotransporte}', 'TipoTransporteController@update')->name('admin.tipotransportes.update')->middleware('permission:admin.supplies.index');

    Route::get('/tipotransportes/{tipotransporte}', 'TipoTransporteController@show')->name('admin.tipotransportes.show')->middleware('permission:admin.supplies.index');

    Route::delete('/tipotransporte/{tipotransporte}', 'TipoTransporteController@destroy')->name('admin.tipotransportes.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/tipotransportes/{tipotransporte}/edit', 'TipoTransporteController@edit')->name('admin.tipotransportes.edit')->middleware('permission:admin.supplies.index');

    //Tipo de producto para despachos

    Route::post('/tipoproductodispatches/store', 'TipoProductoDispatchController@store')->name('admin.tipoproductodispatches.store')->middleware('permission:dispatch.index');

    Route::get('/tipoproductodispatches', 'TipoProductoDispatchController@index')->name('admin.tipoproductodispatches.index')->middleware('permission:dispatch.index');

    Route::get('/tipoproductodispatches/create', 'TipoProductoDispatchController@create')->name('admin.tipoproductodispatches.create')->middleware('permission:dispatch.index');

    Route::put('/tipoproductodispatches/{tipoproductodispatch}', 'TipoProductoDispatchController@update')->name('admin.tipoproductodispatches.update')->middleware('permission:dispatch.index');

    Route::get('/tipoproductodispatches/{tipoproductodispatch}', 'TipoProductoDispatchController@show')->name('admin.tipoproductodispatches.show')->middleware('permission:dispatch.index');

    Route::delete('/tipoproductodispatch/{tipoproductodispatch}', 'TipoProductoDispatchController@destroy')->name('admin.tipoproductodispatches.destroy')->middleware('permission:dispatch.index');

    Route::get('/tipoproductodispatches/{tipoproductodispatch}/edit', 'TipoProductoDispatchController@edit')->name('admin.tipoproductodispatches.edit')->middleware('permission:dispatch.index');

    //Despachos

    Route::post('/dispatch/store', 'DispatchController@store')->name('dispatch.store')->middleware('permission:dispatch.index');

     Route::get('/dispatch/delete', 'DispatchController@delete')->name('dispatch.delete')
        ->middleware('permission:dispatch.index');

    Route::get('/dispatch', 'DispatchController@index')->name('dispatch.index')->middleware('permission:dispatch.index');

    Route::get('/dispatch/create', 'DispatchController@create')->name('dispatch.create')->middleware('permission:dispatch.index');

    Route::put('/dispatch/{dispatch}', 'DispatchController@update')->name('dispatch.update')->middleware('permission:dispatch.index');

    Route::get('/dispatch/{dispatch}', 'DispatchController@show')->name('dispatch.show')->middleware('permission:dispatch.index');

    Route::delete('/dispatch/{dispatch}', 'DispatchController@destroy')->name('dispatch.destroy')->middleware('permission:dispatch.index');

    Route::get('/dispatch/{dispatch}/edit', 'DispatchController@edit')->name('dispatch.edit')->middleware('permission:dispatch.index');

    Route::get('/camara', 'DispatchController@getSubprocess')->name('dispatch.getProcess')->middleware('permission:lotes.index');


    Route::get('dispatch-list', 'DispatchController@getData')->middleware('permission:dispatch.index');

    //TipoDespacho

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('tipodispatches', 'TipoDispatchController')->names('admin.tipodispatches')->parameters(['tipodispatches' => 'tipodispatch']);
    });

    Route::post('/tipodispatches/store', 'TipoDispatchController@store')->name('admin.tipodispatches.store')->middleware('permission:admin.supplies.index');

    Route::get('/tipodispatches', 'TipoDispatchController@index')->name('admin.tipodispatches.index')->middleware('permission:admin.supplies.index');

    Route::get('/tipodispatches/create', 'TipoDispatchController@create')->name('admin.tipodispatches.create')->middleware('permission:admin.supplies.index');

    Route::put('/tipodispatches/{tipodispatch}', 'TipoDispatchController@update')->name('admin.tipodispatches.update')->middleware('permission:admin.supplies.index');

    Route::get('/tipodispatches/{tipodispatch}', 'TipoDispatchContr oller@show')->name('admin.tipodispatch.show')->middleware('permission:admin.supplies.index');

    Route::delete('/tipodispatch/{tipodispatch}', 'TipoDispatchController@destroy')->name('admin.tipodispatches.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/tipodispatches/{tipodispatch}/edit', 'TipoDispatchController@edit')->name('admin.tipodispatches.edit')->middleware('permission:admin.supplies.index');

    //Estatus

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('statuses', 'StatusController')->names('admin.statuses')->parameters(['statuses' => 'status']);
    });

    Route::post('/statuses/store', 'StatusController@store')->name('admin.statuses.store')->middleware('permission:admin.supplies.index');

    Route::get('/statuses', 'StatusController@index')->name('admin.statuses.index')->middleware('permission:admin.supplies.index');

    Route::get('/statuses/create', 'StatusController@create')->name('admin.statuses.create')->middleware('permission:admin.supplies.index');

    Route::put('/statuses/{status}', 'StatusController@update')->name('admin.statuses.update')->middleware('permission:admin.supplies.index');

    Route::get('/statuses/{status}', 'StatusController@show')->name('admin.statuses.show')->middleware('permission:admin.supplies.index');

    Route::delete('/statuses/{status}', 'StatusController@destroy')->name('admin.statuses.destroy')->middleware('permission:admin.supplies.index');

    Route::get('/statuses/{status}/edit', 'StatusController@edit')->name('admin.statuses.edit')->middleware('permission:admin.supplies.index');

    //TrayINNNNNNNNsssssssssssssssssssssssssssssssssssss STORE

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('trays', 'TrayInController')->names('admin.trays')->parameters(['trays' => 'tray']);
    });

    Route::post('/trays/store', 'TrayInController@store')->name('admin.trays.store')->middleware('permission:admin.trays.index');

    Route::get('/trays', 'TrayInController@index')->name('admin.trays.index')->middleware('permission:admin.trays.index');

    Route::get('/trays/create', 'TrayInController@create')->name('admin.trays.create')->middleware('permission:admin.trays.index');

    Route::put('/trays/{tray}', 'TrayInController@update')->name('admin.trays.update')->middleware('permission:admin.trays.index');

    Route::get('/trays/{tray}', 'TrayInController@show')->name('admin.trays.show')->middleware('permission:admin.trays.index');

    Route::delete('/trays/{tray}', 'TrayInController@destroy')->name('admin.trays.destroy')->middleware('permission:admin.trays.index');

    Route::get('/trays/{tray}/edit', 'TrayInController@edit')->name('admin.trays.edit')->middleware('permission:admin.trays.index');
});
