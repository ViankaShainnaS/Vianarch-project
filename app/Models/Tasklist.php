<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected $fillable =[
        'order_id',
        'task_name'
    ];
}
