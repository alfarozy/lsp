<?php

namespace App\Imports;

use App\Models\Question;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToModel, WithHeadingRow
{
    use SkipsErrors;
    public function model(array $row)
    {
        $sequence = Question::count() + 1;

        return new Question([
            'question' => $row['pertanyaan'],
            'sequence' => $sequence,
            'category_id' => $row['category_id'],
            'enabled' => 1,
        ]);
    }
}
