<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'properties';
    protected $fillabe = ['id','property_name','photo','type','number_of_units','owner','operating_account','lease_term','country','city','address'];

    public function landlord()
    {
        return $this->belongsTo(Landlords::class, 'owner', 'id');
    }

    public function house()
    {
        return $this->belongsTo(Houses::class, 'type', 'id');
    }
}
