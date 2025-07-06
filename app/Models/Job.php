<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    
    // fillable sets which fields are allowed to be mass assigned.
    protected $fillable = ['title', 'salary', 'employer_id'];

    // guarded sets which fields are NOT allowed to be mass assigned.
    // setting guarded to empty array essentially allows all fields to be assigned by default.
    //protected $guarded = [];
    
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}