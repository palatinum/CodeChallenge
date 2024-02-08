<?php

namespace CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest;

use App\Exceptions\LeadNotFound;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeadResource;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadByIdInputportInterface;

class GetLeadByIdController extends Controller
{
    /**
     * @var GetLeadByIdInputportInterface
     */
    private GetLeadByIdInputportInterface $getLeadByIdUseCase;

    /**
     * @param GetLeadByIdInputportInterface $getLeadByIdUseCase
     */
    public function __construct(GetLeadByIdInputportInterface $getLeadByIdUseCase)
    {
        $this->getLeadByIdUseCase = $getLeadByIdUseCase;
    }

    /**
     * Get Lead By Id
     * @OA\GET (
     *     path="/api/lead/{leadId}",
     *     tags={"Lead"},
     *     @OA\Parameter(name="leadId", description="Unique identifier for lead, eg; 1", required=true, in="path", @OA\Schema(type="integer")),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="client_id", type="number", example=1),
     *              @OA\Property(property="email", type="string", example="john@test.com"),
     *              @OA\Property(property="mortgage_request_amount", type="integer", example=123),
     *              @OA\Property(property="purpose_mortgage", type="string", example="primera-vivienda"),
     *              @OA\Property(property="score", type="integer", example=100)
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="error", type="string", example="Lead not found"),
     *          ),
     *      )
     * )
     * @param int $leadId
     * @return LeadResource
     * @throws LeadNotFound
     */
    public function __invoke(int $leadId): LeadResource
    {
        $lead = $this->getLeadByIdUseCase->__invoke(
            $leadId
        );
        if(!$lead) {
            throw new LeadNotFound();
        }
        return new LeadResource($lead);
    }
}
