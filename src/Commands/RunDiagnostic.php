<?php


namespace Webkid\LaravelDiagnostic\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class RunDiagnostic extends Command
{
    protected $signature = 'dg:run';

    public function handle()
    {
        $this->checkDB();

        $this->checkRedis();
    }

    private function checkDB()
    {
        $this->info('DB checking...');

        try {
            DB::connection()->getPdo();
            $this->info('DB connection has been established!');
        } catch (\Exception $e) {
            $this->error('Could not connect to the database.');
            $this->comment('Message :' . $e->getMessage());
        }
    }

    private function checkRedis()
    {
        $this->line('');
        $this->info('Redis checking...');

        try {
            Redis::connection();
            $this->info('Redis connection has been established!');
        } catch (\Exception $e) {
            $this->error('Could not connect to the redis.');
            $this->comment('Message :' . $e->getMessage());
        }
    }
}
