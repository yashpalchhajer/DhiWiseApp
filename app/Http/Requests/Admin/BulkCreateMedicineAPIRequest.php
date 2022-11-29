<?php

namespace App\Http\Requests\Admin;

use App\Constants\DosageFormConstant;
use App\Constants\GSTConstant;
use App\Constants\PackageConstant;
use App\Constants\UOMConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkCreateMedicineAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'data.*.name' => ['nullable', 'string'],
            'data.*.name_for_web' => ['nullable', 'string'],
            'data.*.ws_code' => ['nullable', 'string'],
            'data.*.sky_view_code' => ['nullable', 'string'],
            'data.*.is_assured' => ['nullable', 'string'],
            'data.*.dosage_form' => ['nullable', Rule::in(DosageFormConstant::DosageForm)],
            'data.*.package' => ['nullable', Rule::in(PackageConstant::Package)],
            'data.*.uom' => ['nullable', Rule::in(UOMConstant::UOM)],
            'data.*.package_size' => ['nullable', 'string'],
            'data.*.gst' => ['nullable', Rule::in(GSTConstant::GST)],
            'data.*.hsn_code' => ['nullable', 'string'],
            'data.*.is_discontinued' => ['boolean'],
            'data.*.manufacturer' => ['nullable', 'exists:manufacturers,id'],
        ];
    }
}
