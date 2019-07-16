<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Exception;
use Illuminate\Routing\Controller;
use League\Flysystem\Adapter\Local;
use Log;

use Response;
use Storage;
use Session;

class Backup extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = Session::get('msg');
        return view('welcome',['session'=>$session]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        try {
            ini_set('max_execution_time', 600);

            Log::info('Backpack\BackupManager -- Called backup:run from admin interface');

            Artisan::call('backup:run',['--only-db'=>true]);

            Log::info("Backpack\BackupManager -- backup process has started");
        } catch (Exception $e) {
            Response::make($e->getMessage(), 500);
			
        }
        Session::put('msg','Backup completed');
        return redirect('/');
    }
}