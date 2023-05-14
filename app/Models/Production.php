<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;
use App\Models\Division;

class Production extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getDivision()
    {
        return $this->belongsTo(Division::class, 'division_origin');
    }


    public function getDivisionTarget()
    {
        return $this->belongsTo(Division::class, 'target_division');
    }

    public function getItemsAttribute()
    {
        $data = json_decode($this->item_id);
        return Item::whereIn('id', $data)->get();
    }
}
