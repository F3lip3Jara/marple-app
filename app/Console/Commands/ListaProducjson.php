<?php

namespace App\Console\Commands;

use App\Models\Producto;
use Illuminate\Console\Command;

class ListaProducjson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:listProduct';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Json de Productos';

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
        $file = fopen('.\database\data\productos.json' , 'w');

        $productos  = Producto::all();
        fwrite($file, $productos . PHP_EOL);
        fclose($file);
    }
}
