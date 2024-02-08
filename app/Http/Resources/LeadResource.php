<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{
    /**
     * @param $resource
     * @param int $statusCode
     */
    public function __construct($resource, int $statusCode = 200)
    {
        parent::__construct($resource);
        $this->statusCode = $statusCode;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return $this->serializeArray();
    }

    /**
     * @param $request
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return parent::toResponse($request)->setStatusCode($this->statusCode);
    }
}
