<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class MedicineResource extends BaseAPIResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $fieldsFilter = $request->get('fields');
        if (!empty($fieldsFilter) || $request->get('include')) {
            return $this->resource->toArray();
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_for_web' => $this->name_for_web,
            'ws_code' => $this->ws_code,
            'sky_view_code' => $this->sky_view_code,
            'is_assured' => $this->is_assured,
            'dosage_form' => $this->dosage_form,
            'package' => $this->package,
            'uom' => $this->uom,
            'package_size' => $this->package_size,
            'gst' => $this->gst,
            'hsn_code' => $this->hsn_code,
            'is_discontinued' => $this->is_discontinued,
            'manufacturer' => $this->manufacturer,
            'updated_at' => $this->updated_at,
            'added_by' => $this->added_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
