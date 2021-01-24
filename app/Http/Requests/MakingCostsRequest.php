<?php

namespace App\Http\Requests;

use App\Repository\IncomeBaseRepository;
use Illuminate\Foundation\Http\FormRequest;

class MakingCostsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $incomeBaseRepository = new IncomeBaseRepository();

        return [
            'income_base_id' => 'exists:income_base,id',
            'cost_base_id' => 'exists:cost_base,id',
            'sum' => "gt:0|max:".$incomeBaseRepository->getById($this->input('income_base_id'))->total,
        ];
    }
}
