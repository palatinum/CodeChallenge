<?php

namespace CodeChallenge\Client\Infrastructure\Inputadapter\Http\APIRest;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClientRequest;
use App\Http\Resources\CreateClientResource;
use CodeChallenge\Client\Infrastructure\Inputport\CreateClientInputportInterface;

class CreateClientController extends Controller
{
    /**
     * @var CreateClientInputportInterface
     */
    private CreateClientInputportInterface $createClientUseCase;

    public function __construct(CreateClientInputportInterface $createClientUseCase)
    {
        $this->createClientUseCase = $createClientUseCase;
    }

    /**
     * Create Client
     * @OA\Post (
     *     path="/api/client",
     *     tags={"Client"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="phone",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"John",
     *                     "email":"john@test.com",
     *                     "phone":"66666666"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *                   @OA\Property(property="name", type="string", example="John"),
     *                   @OA\Property(property="email", type="string", example="john@test.com"),
     *                   @OA\Property(property="phone", type="string", example="66666666")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="name", type="array", collectionFormat="multi",
     *                      @OA\Items(
     *                          type="string",
     *                          example="The name field is required.",
     *                      )
     *                  ),
     *                  @OA\Property(property="email", type="array", collectionFormat="multi",
     *                      @OA\Items(
     *                          type="string",
     *                          example="The name email is required.",
     *                      )
     *                  ),
     *          ),
     *      )
     * )
     * @param CreateClientRequest $request
     * @return CreateClientResource
     */
    public function __invoke(CreateClientRequest $request): CreateClientResource
    {
        $client = $this->createClientUseCase->__invoke(
            $request->string('name'),
            $request->string('email'),
            $request->string('phone'),
        );
        return new CreateClientResource($client);
    }
}
