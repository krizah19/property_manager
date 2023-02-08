<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'payments';
    protected $fillabe = ['id','pay_date','author','invoice_number','tenants','pay_for','payment_amount',];

    public function resident()
    {
        return $this->belongsTo(Tenants::class, 'tenants', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function bill()
    {
        return $this->belongsTo(Bills::class, 'pay_for', 'id');
    }
}
