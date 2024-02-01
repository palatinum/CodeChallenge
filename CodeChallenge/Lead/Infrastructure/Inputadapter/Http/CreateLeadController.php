<?php

namespace CodeChallenge\Lead\Infrastructure\Inputadapter\Http;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLeadRequest;
use App\Http\Resources\CreateLeadResource;
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
     * @param CreateLeadRequest $request
     * @return CreateLeadResource
     */
    public function __invoke(CreateLeadRequest $request): CreateLeadResource
    {
        $lead = $this->createLeadUseCase->__invoke(
            $request->get('name'),
            $request->get('email'),
            $request->get('phone'),
        );
        return new CreateLeadResource($lead);
    }
}
