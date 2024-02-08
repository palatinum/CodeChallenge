<?php

namespace CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest;

use App\Exceptions\LeadNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLeadRequest;
use App\Http\Resources\LeadResource;
use CodeChallenge\Lead\Infrastructure\Inputport\UpdateLeadInputportInterface;

class UpdateLeadController extends Controller
{
    /**
     * @var UpdateLeadInputportInterface
     */
    private UpdateLeadInputportInterface $updateLeadUseCase;

    /**
     * @param UpdateLeadInputportInterface $updateLeadUseCase
     */
    public function __construct(UpdateLeadInputportInterface $updateLeadUseCase)
    {
        $this->updateLeadUseCase = $updateLeadUseCase;
    }

    /**
     * Update Lead
     * @OA\Put (
     *     path="/api/lead/{leadId}",
     *     tags={"Lead"},
     *     @OA\Parameter(name="leadId", description="Unique identifier for lead, eg; 1", required=true, in="path", @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      @OA\Property(
     *                          property="mortgage_request_amount",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="purpose_mortgage",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "mortgage_request_amount":123,
     *                     "purpose_mortgage":"segunda-vivienda"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="client_id", type="number", example=1),
     *              @OA\Property(property="email", type="string", example="john@test.com"),
     *              @OA\Property(property="mortgage_request_amount", type="integer", example=123),
     *              @OA\Property(property="purpose_mortgage", type="string", example="segunda-vivienda"),
     *              @OA\Property(property="score", type="integer", example=123)
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="mortgage_request_amount", type="array", collectionFormat="multi",
     *                       @OA\Items(
     *                           type="string",
     *                           example="The mortgage request amount field is required.",
     *                       )
     *                   ),
     *                   @OA\Property(property="purpose_mortgage", type="array", collectionFormat="multi",
     *                       @OA\Items(
     *                           type="string",
     *                           example="The purpose mortgage field is required.",
     *                       )
     *                   )
     *          ),
     *      )
     * )
     * @param int $id
     * @param UpdateLeadRequest $request
     * @return LeadResource
     * @throws LeadNotFound
     */
    public function __invoke(int $id, UpdateLeadRequest $request): LeadResource
    {
        $lead = $this->updateLeadUseCase->__invoke(
            $id,
            $request->integer('mortgage_request_amount'),
            $request->string('purpose_mortgage'),
        );
        if(!$lead) {
            throw new LeadNotFound();
        }
        return new LeadResource($lead);
    }
}
