<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packing extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getProduction()
    {
        return $this->belongsTo(Production::class, 'production_id');
    }

    public function getProductsAttribute()
    {
        $data = json_decode($this->production_id);
        return Production::whereIn('id', $data)->get();
    }
}
