<?php

namespace App\Models;

use App\Models\Customer\CustomerIdentity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'rcl_customer_id', 'full_name', 'first_name', 'last_name', 'house_no', 'street', 'post_code', 'state','city', 'country', 'tel', 'cell_number','email', 'mother_name', 'registered_by', 'register_date', 'number_of_transaction', 'status', 'created_at', 'updated_at', 'deleted_at'];
    protected $table = 'customers';
    public function transactions(): HasMany
    {
        return $this->hasMany(TransactionsData::class, 'customer_id', 'customer_id');
    }

    public function customerIdentity(): HasOne
    {
        return $this->hasOne(CustomerIdentity::class,'customer_id');
    }
}
