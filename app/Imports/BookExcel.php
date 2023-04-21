<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BookExcel implements ToCollection
{
    private $data = [];
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $types = [];
        $books = [];
        foreach ($collection as $row) {
            if (!empty($row[0])) {
                $types[] = $row[0];
            }
            if (!empty($row[1]) && !empty($row[2])) {
                $books[] = [
                    'type' => end($types),
                    'book' => $row[1],
                    'author' => $row[2]
                ];
            }
        }
        $this->data =[
            'types' => $types,
            'books' => $books
        ];
    }

    public function getData()
    {
        return $this->data;
    }
}
