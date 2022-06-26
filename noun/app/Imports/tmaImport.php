<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\tma;

class tmaImport implements ToCollection, WithHeadingRow
{
    protected $course;

    function __construct($course) {
            $this->course = $course;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $tma = new tma;
            $tma->question = $row['question'];
            $tma->answer = $row['answer'];
            $tma->course = $this->course;
            $tma->save();
        }
    }
}
