<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * php artisan backup:db
     */
    protected $signature = 'backup:db';

    /**
     * The console command description.
     */
    protected $description = 'Manually backup the database into storage/backups';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get DB connection details from .env
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host     = env('DB_HOST');


        // Backup file name
        $date = Carbon::now()->format('Y-m-d_H-i-s');
        $backupPath = storage_path("backups");
        $backupFile = $backupPath . "/backup_{$date}.sql";

        // Ensure backup folder exists
        if (!File::exists($backupPath)) {
            File::makeDirectory($backupPath, 0755, true);
        }

        // Run mysqldump command
        $command = "mysqldump -h {$host} -u {$username} " . 
                   (!empty($password) ? "-p'{$password}' " : "") . 
                   "{$database} > {$backupFile}";

        $returnVar = null;
        $output = null;

        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            $this->info("✅ Backup completed successfully! File: {$backupFile}");
        } else {
            $this->error("❌ Backup failed. Please check mysqldump configuration.");
        }
    }
}
