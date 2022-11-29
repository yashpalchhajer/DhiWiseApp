<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Molecule extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'molecules';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'is_refrigerated',
        'schedule_type_code',
        'is_chronic_acute',
        'can_sell_online',
        'is_r_x_required',
        'is_active',
        'created_at',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name' => 'string',
        'is_refrigerated' => 'string',
        'schedule_type_code' => 'string',
        'is_chronic_acute' => 'string',
        'can_sell_online' => 'boolean',
        'is_r_x_required' => 'boolean',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];
}
