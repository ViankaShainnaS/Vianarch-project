<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = true;
    protected $fillable = [
        'username',
        'phone_number',
        'category',
        'visual',
        'email',
        'area',
        'typeOfBuilding',
        'status',
        'user_id'
    ];
    protected $casts = [
    'finished_at' => 'datetime',
    'birthdate' => 'datetime'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = trim($value);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function tasklists()
    {
        return $this->hasMany(Tasklist::class);
    }

}
