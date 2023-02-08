<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leases extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'leases';
    protected $fillabe = ['id','tenants','status','properties','unit','type','occupants','start_date','end_date','recurring_charges','due_date','rent','deposit','deposit_date','emergency_contact','co_signer','notes','agreement'];

    public function tenant()
    {
        return $this->belongsTo(Tenants::class, 'tenants', 'id');
    }

    public function property()
    {
        return $this->belongsTo(Properties::class, 'properties', 'id');
    }

    public function house()
    {
        return $this->belongsTo(Units::class, 'unit', 'id');
    }
}