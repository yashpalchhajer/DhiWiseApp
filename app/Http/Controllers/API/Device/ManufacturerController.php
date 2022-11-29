<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateManufacturerAPIRequest;
use App\Http\Requests\Device\BulkUpdateManufacturerAPIRequest;
use App\Http\Requests\Device\CreateManufacturerAPIRequest;
use App\Http\Requests\Device\UpdateManufacturerAPIRequest;
use App\Http\Resources\Device\ManufacturerCollection;
use App\Http\Resources\Device\ManufacturerResource;
use App\Repositories\ManufacturerRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ManufacturerController extends AppBaseController
{
    /**
     * @var ManufacturerRepository
     */
    private ManufacturerRepository $manufacturerRepository;

    /**
     * @param ManufacturerRepository $manufacturerRepository
     */
    public function __construct(ManufacturerRepository $manufacturerRepository)
    {
        $this->manufacturerRepository = $manufacturerRepository;
    }

    /**
     * Manufacturer's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ManufacturerCollection
     */
    public function index(Request $request): ManufacturerCollection
    {
        $manufacturers = $this->manufacturerRepository->fetch($request);

        return new ManufacturerCollection($manufacturers);
    }

    /**
     * Create Manufacturer with given payload.
     *
     * @param CreateManufacturerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ManufacturerResource
     */
    public function store(CreateManufacturerAPIRequest $request): ManufacturerResource
    {
        $input = $request->all();
        $manufacturer = $this->manufacturerRepository->create($input);

        return new ManufacturerResource($manufacturer);
    }

    /**
     * Get single Manufacturer record.
     *
     * @param int $id
     *
     * @return ManufacturerResource
     */
    public function show(int $id): ManufacturerResource
    {
        $manufacturer = $this->manufacturerRepository->findOrFail($id);

        return new ManufacturerResource($manufacturer);
    }

    /**
     * Update Manufacturer with given payload.
     *
     * @param UpdateManufacturerAPIRequest $request
     * @param int                          $id
     *
     * @throws ValidatorException
     *
     * @return ManufacturerResource
     */
    public function update(UpdateManufacturerAPIRequest $request, int $id): ManufacturerResource
    {
        $input = $request->all();
        $manufacturer = $this->manufacturerRepository->update($input, $id);

        return new ManufacturerResource($manufacturer);
    }

    /**
     * Delete given Manufacturer.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->manufacturerRepository->delete($id);

        return $this->successResponse('Manufacturer deleted successfully.');
    }

    /**
     * Bulk create Manufacturer's.
     *
     * @param BulkCreateManufacturerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ManufacturerCollection
     */
    public function bulkStore(BulkCreateManufacturerAPIRequest $request): ManufacturerCollection
    {
        $manufacturers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $manufacturerInput) {
            $manufacturers[$key] = $this->manufacturerRepository->create($manufacturerInput);
        }

        return new ManufacturerCollection($manufacturers);
    }

    /**
     * Bulk update Manufacturer's data.
     *
     * @param BulkUpdateManufacturerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ManufacturerCollection
     */
    public function bulkUpdate(BulkUpdateManufacturerAPIRequest $request): ManufacturerCollection
    {
        $manufacturers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $manufacturerInput) {
            $manufacturers[$key] = $this->manufacturerRepository->update($manufacturerInput, $manufacturerInput['id']);
        }

        return new ManufacturerCollection($manufacturers);
    }
}
