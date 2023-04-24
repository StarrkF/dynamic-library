<?php

namespace App\Console\Commands;

use App\Models\Book;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AuthorSlugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'author:slug';

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
        $books = Book::select('id','author')->get();
        foreach ($books as $book) {
            Book::where('id', $book->id)->update(['author_slug' => Str::slug($book->author)]);
        }

        $this->info('Completed!');
    }
}
