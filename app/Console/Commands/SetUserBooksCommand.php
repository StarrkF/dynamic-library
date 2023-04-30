<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\User;
use Illuminate\Console\Command;

class SetUserBooksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set-user-books:betul';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $betul = User::whereEmail('betul@mail')->first()->id;
        Book::query()->update(['user_id' => $betul]);
    }
}
