<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeleteLeadResource extends JsonResource
{
    /**
     * @var bool
     */
    private bool $deleted;

    /**
     * @param bool $deleted
     */
    public function __construct(bool $deleted)
    {
        parent::__construct($deleted);
        $this->deleted = $deleted;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'deleted' => $this->deleted
        ];
    }
}
