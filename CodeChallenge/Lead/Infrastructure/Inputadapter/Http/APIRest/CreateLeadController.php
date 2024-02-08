<?php

namespace CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLeadRequest;
use App\Http\Resources\LeadResource;
use CodeChallenge\Lead\Infrastructure\Inputport\CreateLeadInputportInterface;

class CreateLeadController extends Controller
{
    /**
     * @var CreateLeadInputportInterface
     */
    private CreateLeadInputportInterface $createLeadUseCase;

    /**
     * @param CreateLeadInputportInterface $createLeadUseCase
     */
    public function __construct(CreateLeadInputportInterface $createLeadUseCase)
    {
        $this->createLeadUseCase = $createLeadUseCase;
    }

    /**
     * Create Lead
     * @OA\Post (
     *     path="/api/lead",
     *     tags={"Lead"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="client_id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
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
     *                     "client_id":1,
     *                     "email":"john@test.com",
     *                     "mortgage_request_amount":123,
     *                     "purpose_mortgage":"primera-vivienda"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
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
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="client_id", type="array", collectionFormat="multi",
     *                      @OA\Items(
     *                          type="string",
     *                          example="The client id field is required.",
     *                      )
     *                  ),
     *                  @OA\Property(property="email", type="array", collectionFormat="multi",
     *                      @OA\Items(
     *                          type="string",
     *                          example="The email field is required.",
     *                      )
     *                  ),
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
     * @param CreateLeadRequest $request
     * @return LeadResource
     */
    public function __invoke(CreateLeadRequest $request): LeadResource
    {
        $lead = $this->createLeadUseCase->__invoke(
            $request->integer('client_id'),
            $request->string('email'),
            $request->integer('mortgage_request_amount'),
            $request->string('purpose_mortgage'),
        );
        return new LeadResource($lead, 201);
    }
}
