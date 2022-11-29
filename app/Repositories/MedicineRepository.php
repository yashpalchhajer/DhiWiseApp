<?php

namespace App\Repositories;

use App\Models\Medicine;

class MedicineRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
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
     * @return string[]
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return Medicine::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser', 'manufacturer'];
    }
}
