<?php

namespace App\Models;

use App\Models\EntrepreneurshipTrainingProgress;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntrepreneurshipTrainingProgress extends Model
{
    use SoftDeletes;

    protected $table = 'entrepreneurship_training_progress';

    protected $fillable = [
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}