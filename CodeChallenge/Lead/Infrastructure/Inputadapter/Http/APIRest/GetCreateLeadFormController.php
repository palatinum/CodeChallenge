<?php

namespace CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest;

use App\Http\Controllers\Controller;
use App\Http\Resources\GetCreateLeadFormResource;
use CodeChallenge\Lead\Infrastructure\Inputport\GetCreateLeadFormInputportInterface;

class GetCreateLeadFormController extends Controller
{
    /**
     * @var GetCreateLeadFormInputportInterface
     */
    private GetCreateLeadFormInputportInterface $createLeadFormUseCase;

    /**
     * @param GetCreateLeadFormInputportInterface $createLeadFormUseCase
     */
    public function __construct(GetCreateLeadFormInputportInterface $createLeadFormUseCase)
    {
        $this->createLeadFormUseCase = $createLeadFormUseCase;
    }

    /**
     * Get Create Lead Form
     * @OA\GET (
     *     path="/api/lead/form",
     *     tags={"Lead"},
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                   @OA\Property(property="id", type="string", example="name"),
     *                   @OA\Property(property="label", type="string", example="Full name"),
     *                   @OA\Property(property="placeholder", type="string", example="Enter full name"),
     *                   @OA\Property(property="type", type="string", example="text"),
     *                   @OA\Property(property="validationType", type="string", example="string"),
     *                   @OA\Property(property="value", type="string", example="John"),
     *                   @OA\Property(property="validations", type="string", example="[]"),
     *              ),
     *          )
     *      )
     * )
     * @return GetCreateLeadFormResource
     */
    public function __invoke(): GetCreateLeadFormResource
    {
        $form = $this->createLeadFormUseCase->__invoke();
        return new GetCreateLeadFormResource($form);
    }
}
