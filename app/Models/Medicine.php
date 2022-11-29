<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Medicine extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'medicines';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'name_for_web',
        'ws_code',
        'sky_view_code',
        'is_assured',
        'dosage_form',
        'package',
        'uom',
        'package_size',
        'gst',
        'hsn_code',
        'is_discontinued',
        'manufacturer',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name' => 'string',
        'name_for_web' => 'string',
        'ws_code' => 'string',
        'sky_view_code' => 'string',
        'is_assured' => 'string',
        'dosage_form' => 'string',
        'package' => 'string',
        'uom' => 'string',
        'package_size' => 'string',
        'gst' => 'string',
        'hsn_code' => 'string',
        'is_discontinued' => 'boolean',
        'manufacturer' => 'integer',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class, 'id', 'manufacturer');
    }
}
