<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobBatchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'total_jobs' => $this->total_jobs,
            'pending_jobs' => $this->pending_jobs,
            'failed_jobs' => $this->failed_jobs,
            'failed_job_ids' => $this->failed_job_ids,
            'options' => $this->options,
            'cancelled_at' => $this->cancelled_at,
            'finished_at' => $this->finished_at,
        ];
    }
}
