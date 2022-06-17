<?php

namespace App\Console\Commands;

use App\Models\Berita;
use Illuminate\Console\Command;

class everyMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'month:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset JumlahViewsBulan from Table Berita for last 30 days';

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
        $berita = Berita::all();
        foreach($berita as $news){
            $news->jumlah_views_bulan = 0;
            $news->update();
        }
    }
}
