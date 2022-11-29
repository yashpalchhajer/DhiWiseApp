<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Manufacturer extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'manufacturers';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
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
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'manufacturer', 'id');
    }
}
