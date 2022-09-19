<?php

namespace App\Http\Requests\Apis\Campaign;

use Illuminate\Foundation\Http\FormRequest;

class CreateCampaignApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["required", "string"],
            "from" => ["required", "date"],
            "to" => ["required", "date"],
            "total" => ["required", "numeric"],
            "daily_budget" => ["required", "numeric"]
        ];
    }
}
