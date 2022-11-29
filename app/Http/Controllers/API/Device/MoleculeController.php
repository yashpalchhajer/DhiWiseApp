<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateMoleculeAPIRequest;
use App\Http\Requests\Device\BulkUpdateMoleculeAPIRequest;
use App\Http\Requests\Device\CreateMoleculeAPIRequest;
use App\Http\Requests\Device\UpdateMoleculeAPIRequest;
use App\Http\Resources\Device\MoleculeCollection;
use App\Http\Resources\Device\MoleculeResource;
use App\Repositories\MoleculeRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class MoleculeController extends AppBaseController
{
    /**
     * @var MoleculeRepository
     */
    private MoleculeRepository $moleculeRepository;

    /**
     * @param MoleculeRepository $moleculeRepository
     */
    public function __construct(MoleculeRepository $moleculeRepository)
    {
        $this->moleculeRepository = $moleculeRepository;
    }

    /**
     * Molecule's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return MoleculeCollection
     */
    public function index(Request $request): MoleculeCollection
    {
        $molecules = $this->moleculeRepository->fetch($request);

        return new MoleculeCollection($molecules);
    }

    /**
     * Create Molecule with given payload.
     *
     * @param CreateMoleculeAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MoleculeResource
     */
    public function store(CreateMoleculeAPIRequest $request): MoleculeResource
    {
        $input = $request->all();
        $molecule = $this->moleculeRepository->create($input);

        return new MoleculeResource($molecule);
    }

    /**
     * Get single Molecule record.
     *
     * @param int $id
     *
     * @return MoleculeResource
     */
    public function show(int $id): MoleculeResource
    {
        $molecule = $this->moleculeRepository->findOrFail($id);

        return new MoleculeResource($molecule);
    }

    /**
     * Update Molecule with given payload.
     *
     * @param UpdateMoleculeAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return MoleculeResource
     */
    public function update(UpdateMoleculeAPIRequest $request, int $id): MoleculeResource
    {
        $input = $request->all();
        $molecule = $this->moleculeRepository->update($input, $id);

        return new MoleculeResource($molecule);
    }

    /**
     * Delete given Molecule.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->moleculeRepository->delete($id);

        return $this->successResponse('Molecule deleted successfully.');
    }

    /**
     * Bulk create Molecule's.
     *
     * @param BulkCreateMoleculeAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MoleculeCollection
     */
    public function bulkStore(BulkCreateMoleculeAPIRequest $request): MoleculeCollection
    {
        $molecules = collect();

        $input = $request->get('data');
        foreach ($input as $key => $moleculeInput) {
            $molecules[$key] = $this->moleculeRepository->create($moleculeInput);
        }

        return new MoleculeCollection($molecules);
    }

    /**
     * Bulk update Molecule's data.
     *
     * @param BulkUpdateMoleculeAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MoleculeCollection
     */
    public function bulkUpdate(BulkUpdateMoleculeAPIRequest $request): MoleculeCollection
    {
        $molecules = collect();

        $input = $request->get('data');
        foreach ($input as $key => $moleculeInput) {
            $molecules[$key] = $this->moleculeRepository->update($moleculeInput, $moleculeInput['id']);
        }

        return new MoleculeCollection($molecules);
    }
}
