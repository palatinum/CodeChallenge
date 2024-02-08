<?php

namespace CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest;

use App\Exceptions\LeadNotFound;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeleteLeadResource;
use CodeChallenge\Lead\Infrastructure\Inputport\DeleteLeadInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadByIdInputportInterface;

class DeleteLeadController extends Controller
{
    /**
     * @var DeleteLeadInputportInterface
     */
    private DeleteLeadInputportInterface $deleteLeadUseCase;
    /**
     * @var GetLeadByIdInputportInterface
     */
    private GetLeadByIdInputportInterface $getLeadByIdUseCase;

    /**
     * @param DeleteLeadInputportInterface $deleteLeadUseCase
     * @param GetLeadByIdInputportInterface $getLeadByIdUseCase
     */
    public function __construct(
        DeleteLeadInputportInterface $deleteLeadUseCase,
        GetLeadByIdInputportInterface $getLeadByIdUseCase
    )
    {
        $this->deleteLeadUseCase = $deleteLeadUseCase;
        $this->getLeadByIdUseCase = $getLeadByIdUseCase;
    }

    /**
     * Delete Lead
     * @OA\DELETE (
     *     path="/api/lead/{leadId}",
     *     tags={"Lead"},
     *     @OA\Parameter(name="leadId", description="Unique identifier for lead, eg; 1", required=true, in="path", @OA\Schema(type="integer")),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="deleted", type="boolean", example=true),
     *          ),
     *      )
     * )
     * @param int $leadId
     * @return DeleteLeadResource
     * @throws LeadNotFound
     */
    public function __invoke (int $leadId): DeleteLeadResource
    {
        $lead = $this->getLeadByIdUseCase->__invoke($leadId);
        if(!$lead) {
            throw new LeadNotFound();
        }
        $deleted = $this->deleteLeadUseCase->__invoke($lead);
        return new DeleteLeadResource($deleted);
    }
}
