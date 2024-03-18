<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anlok extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'antriloketcetak';
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql2';
}
