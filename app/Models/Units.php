<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'units';
    protected $fillabe = ['id','property','unit_number','photo','status','size','rooms','bathroom','features','market_rent','rental_amount','deposit_amount','description'];

    public function building()
    {
        return $this->belongsTo(Properties::class, 'property', 'id');
    }
}
