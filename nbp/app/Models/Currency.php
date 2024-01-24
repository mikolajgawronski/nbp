<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $code
 * @property string $name
 * @property float $rate
 */
class Currency extends Model
{
    use HasFactory;

    public $fillable = ['rate'];
}
