<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanApplicationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch (request()->header('X-PARTNER-ID')) {
            case 'alpha':
                return [
                    'customer_name' => 'required|string|max:255',
                    'amount' => 'required|numeric|min:1000|max:1000000',
                    'tenure_months' => 'required|integer|min:1|max:60',
                    'bvn' => 'required|string|size:11|regex:/^\d+$/', // Bank Verification Number
                ];
            case 'beta':
                return [
                    'applicant' => ['required', 'array'],
                    'applicant.fullName' => ['required', 'string', 'max:255'],
                    'applicant.bvn' => ['required', 'digits:11'],

                    'loanDetails' => ['required', 'array'],
                    'loanDetails.duration' => ['required', 'integer', 'min:1'],
                    'loanDetails.amountRequested' => ['required', 'numeric', 'min:1000'],
                ];
            default:
                return [];
        }
    }
}
