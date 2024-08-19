<?php

namespace App\Models\Customer;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerIdentity extends Model
{
    use HasFactory;

    protected $fillable =[ 'id','identity_type_id','customer_id','id_number', 'issue_place', 'gender', 'dob', 'birth_place', 'profession', 'samsub_verified', 'created_at', 'updated_at'];



    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function identityType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CustomerIdentity::class,'identity_type_id');
    }
}
