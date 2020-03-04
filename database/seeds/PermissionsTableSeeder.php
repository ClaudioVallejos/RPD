<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;



class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      

        //RRHH //listo
	        	Permission::create([
	        		"name" => 'Recursos Humanos',
	        		"slug" => 'users.index',
	        		"description" => 'Acceso total al area de usuarios y roles',
	        	]);

		//Aseguramiento de calidad 
	        	Permission::create([
	        		"name" => 'Aseguramiento de calidad',
	        		"slug" => 'auditoria.index',
	        		"description" => 'Acceso total al area de Aseguramiento de calidad',
	        	]);

		//Panel de eliminacion 
	        	Permission::create([
	        		"name" => 'Panel de eliminacion',
	        		"slug" => 'receptions.delete',
	        		"description" => 'Acceso total al area de eliminacion',
	        	]);

		//Configuraciones / Administracion
	        	Permission::create([
	        		"name" => 'Configuraciones/Administracion',
	        		"slug" => 'admin.supplies.index',
	        		"description" => 'Acceso total al area de administracion',
	        	]);

		//Recepcion
	        	Permission::create([
	        		"name" => 'Recepcion y derivados',
	        		"slug" => 'receptions.index',
	        		"description" => 'Acceso total al area de recepcion y sus derivados',
	        	]);

		//proceso
	        	Permission::create([
	        		"name" => 'Proceso',
	        		"slug" => 'process.processes.index',
	        		"description" => 'Acceso total al area de proceso y sus derivados',
	        	]);

		//camara
	        	Permission::create([
	        		"name" => 'Camara',
	        		"slug" => 'lotes.index',
	        		"description" => 'Acceso total al area de camara y sus derivados',
	        	]);

		//despacho
	        	Permission::create([
	        		"name" => 'Despacho',
	        		"slug" => 'dispatch.index',
	        		"description" => 'Acceso total al area de despacho y sus derivados',
	        	]);
		//en transito
	        	Permission::create([
	        		"name" => 'Area en transito',
	        		"slug" => 'reprocess.reprocesses.index',
	        		"description" => 'Acceso total al area en transito (reprocesos)',
	        	]);

		//reportes
	        	Permission::create([
	        		"name" => 'Reportes',
	        		"slug" => 'receptions.receptionsdaily',
	        		"description" => 'Acceso total al area de reportes',
	        	]);

		//control de bandejas  
				Permission::create([
	        		"name" => 'Control de bandejas',
	        		"slug" => 'admin.trays.index',
	        		"description" => 'Acceso total al control de badejas',
	        	]);     

    }
}