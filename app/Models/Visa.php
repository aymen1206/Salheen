<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visa extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['user_id','Country_TO','Cutomer_name','Issue_Date','Departure_at','Visa_type','photo','slug'];


    public function user()
        {
            return $this->belongsTo(User::class , 'user_id');
        }
}
