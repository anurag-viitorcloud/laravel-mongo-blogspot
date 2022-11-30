<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class deleteBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogs:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete blogs which are older than 30 days and are in-active';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            config('model-variables.models.blog.class')::whereDate('created_at', '<=', now()->subDays(30))->delete();
            $this->info(__('blog.blog_deleted_successfully'));

        }  catch (Exception $exception) {
            Log::error($exception);
            $this->info(__('flash_message.something_went_wrong_please_try_again'));
        }
    }
}
