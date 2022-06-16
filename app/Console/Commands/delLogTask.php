<?php

namespace App\Console\Commands;

use App\Models\LogSys ;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class delLogTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logDel:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminación de log';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fecha    = Carbon::now();
        $fechaFin = $fecha->subYear()->format('Y-m-d');
        $fechaIni = $fecha->subYears(1)->format('Y-m-d');
        $texto    = "[".date("Y-m-d H:i:s")."]"." Tarea de limpieza para el año inicio:" .$fechaIni." año fin : ". $fechaFin ;
        Storage::append("dellog_job.txt", $texto);
        LogSys::whereBetween(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), [$fechaIni, $fechaFin])->delete();

    }
}
