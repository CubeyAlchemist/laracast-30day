<?php

namespace App\Models;

class Job 
{
    public static function all(): array
    {
        return [
            ['id' => 1, 'title' => 'Director', 'salary' => 60000],
            ['id' => 2, 'title' => 'Programmer', 'salary' => 20000],
            ['id' => 3, 'title' => 'Teacher', 'salary' => 40000]
        ];
    }

    public static function find(int $id): array
    {
        $job = collect(static::all())->first(fn($job) => $job['id'] == $id);
        if (! $job){
            abort(404);
        }
        return $job;
    }
}