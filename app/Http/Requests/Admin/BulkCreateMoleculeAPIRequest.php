<?php

namespace App\Http\Requests\Admin;

use App\Constants\ChronicConstant;
use App\Constants\ScheduleTypeCodeConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkCreateMoleculeAPIRequest extends FormRequest
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
            'data.*.is_refrigerated' => ['nullable', 'string'],
            'data.*.schedule_type_code' => ['nullable', Rule::in(ScheduleTypeCodeConstant::Schedule)],
            'data.*.is_chronic_acute' => ['nullable', Rule::in(ChronicConstant::Chronic)],
            'data.*.can_sell_online' => ['boolean'],
            'data.*.is_r_x_required' => ['boolean'],
            'data.*.is_active' => ['boolean'],
        ];
    }
}
