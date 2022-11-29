<?php

namespace App\Http\Requests\Admin;

use App\Constants\DosageFormConstant;
use App\Constants\GSTConstant;
use App\Constants\PackageConstant;
use App\Constants\UOMConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMedicineAPIRequest extends FormRequest
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
            'name' => ['nullable', 'string'],
            'name_for_web' => ['nullable', 'string'],
            'ws_code' => ['nullable', 'string'],
            'sky_view_code' => ['nullable', 'string'],
            'is_assured' => ['nullable', 'string'],
            'dosage_form' => ['nullable', Rule::in(DosageFormConstant::DosageForm)],
            'package' => ['nullable', Rule::in(PackageConstant::Package)],
            'uom' => ['nullable', Rule::in(UOMConstant::UOM)],
            'package_size' => ['nullable', 'string'],
            'gst' => ['nullable', Rule::in(GSTConstant::GST)],
            'hsn_code' => ['nullable', 'string'],
            'is_discontinued' => ['boolean'],
            'manufacturer' => ['nullable', 'exists:manufacturers,id'],
        ];
    }
}
