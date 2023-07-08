<?php

namespace App\Console\Commands;

use App\Models\TemporaryFile;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CleanTemporaryFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:temporary-files';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete temporary files older than one hour';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $threshold = Carbon::now()->subHour();
        $deleted = TemporaryFile::where('created_at', '<', $threshold)->delete();
        $this->info("$deleted temporary files deleted.");

        return Command::SUCCESS;
    }
}
