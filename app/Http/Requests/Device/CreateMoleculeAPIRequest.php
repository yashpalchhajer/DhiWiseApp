<?php

namespace App\Http\Requests\Device;

use App\Constants\ChronicConstant;
use App\Constants\ScheduleTypeCodeConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMoleculeAPIRequest extends FormRequest
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
            'is_refrigerated' => ['nullable', 'string'],
            'schedule_type_code' => ['nullable', Rule::in(ScheduleTypeCodeConstant::Schedule)],
            'is_chronic_acute' => ['nullable', Rule::in(ChronicConstant::Chronic)],
            'can_sell_online' => ['boolean'],
            'is_r_x_required' => ['boolean'],
            'is_active' => ['boolean'],
        ];
    }
}
