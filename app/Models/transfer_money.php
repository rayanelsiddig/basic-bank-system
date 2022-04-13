<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class transfer_money extends Model
{
    use HasFactory;
    protected $fillable = [
       'receiver_after_transfer_amount','receiver_before_transfer_amount','receiver_id','sender_after_transfer_amount','sender_before_transfer_amount','sender_id','transfer_amount'
    ];
    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
}
