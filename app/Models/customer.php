<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'email','address','phone', 'current_balance'
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
    public function transferMoney()
    {
        return $this->hasMany(transfer_money::class);
    }
}
