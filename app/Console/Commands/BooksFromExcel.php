<?php

namespace App\Console\Commands;

use App\Imports\BookExcel;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class BooksFromExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:books';

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
        try {
            $bookExcel = new BookExcel();
            Excel::import($bookExcel, public_path('books.xlsx'));
            $data = $bookExcel->getData();

            foreach ($data['types'] as $type)
            {
               Type::create(['name' => $type ]);
            }

           foreach ($data['books'] as $bookData) {
               $type = Type::where(['name' => $bookData['type']])->first()->id;
               Book::create([
                   'type_id' => $type,
                   'name' => $bookData['book'],
                   'author' => $bookData['author']
               ]);
           }

           $this->info('Completed');
        } catch (\Throwable $th) {
            $this->error('Failed');
        }

    }
}
