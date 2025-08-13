<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobBatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'string|max:191',
            'name' => 'string|max:191',
            'total_jobs' => 'integer',
            'pending_jobs' => 'integer',
            'failed_jobs' => 'integer',
            'failed_job_ids' => 'string',
            'options' => 'string|max:255',
            'cancelled_at' => 'integer',
            'finished_at' => 'integer',
        ];
    }
}
