<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateMedicineAPIRequest;
use App\Http\Requests\Admin\BulkUpdateMedicineAPIRequest;
use App\Http\Requests\Admin\CreateMedicineAPIRequest;
use App\Http\Requests\Admin\UpdateMedicineAPIRequest;
use App\Http\Resources\Admin\MedicineCollection;
use App\Http\Resources\Admin\MedicineResource;
use App\Repositories\MedicineRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class MedicineController extends AppBaseController
{
    /**
     * @var MedicineRepository
     */
    private MedicineRepository $medicineRepository;

    /**
     * @param MedicineRepository $medicineRepository
     */
    public function __construct(MedicineRepository $medicineRepository)
    {
        $this->medicineRepository = $medicineRepository;
    }

    /**
     * Medicine's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return MedicineCollection
     */
    public function index(Request $request): MedicineCollection
    {
        $medicines = $this->medicineRepository->fetch($request);

        return new MedicineCollection($medicines);
    }

    /**
     * Create Medicine with given payload.
     *
     * @param CreateMedicineAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MedicineResource
     */
    public function store(CreateMedicineAPIRequest $request): MedicineResource
    {
        $input = $request->all();
        $medicine = $this->medicineRepository->create($input);

        return new MedicineResource($medicine);
    }

    /**
     * Get single Medicine record.
     *
     * @param int $id
     *
     * @return MedicineResource
     */
    public function show(int $id): MedicineResource
    {
        $medicine = $this->medicineRepository->findOrFail($id);

        return new MedicineResource($medicine);
    }

    /**
     * Update Medicine with given payload.
     *
     * @param UpdateMedicineAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return MedicineResource
     */
    public function update(UpdateMedicineAPIRequest $request, int $id): MedicineResource
    {
        $input = $request->all();
        $medicine = $this->medicineRepository->update($input, $id);

        return new MedicineResource($medicine);
    }

    /**
     * Delete given Medicine.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->medicineRepository->delete($id);

        return $this->successResponse('Medicine deleted successfully.');
    }

    /**
     * Bulk create Medicine's.
     *
     * @param BulkCreateMedicineAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MedicineCollection
     */
    public function bulkStore(BulkCreateMedicineAPIRequest $request): MedicineCollection
    {
        $medicines = collect();

        $input = $request->get('data');
        foreach ($input as $key => $medicineInput) {
            $medicines[$key] = $this->medicineRepository->create($medicineInput);
        }

        return new MedicineCollection($medicines);
    }

    /**
     * Bulk update Medicine's data.
     *
     * @param BulkUpdateMedicineAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MedicineCollection
     */
    public function bulkUpdate(BulkUpdateMedicineAPIRequest $request): MedicineCollection
    {
        $medicines = collect();

        $input = $request->get('data');
        foreach ($input as $key => $medicineInput) {
            $medicines[$key] = $this->medicineRepository->update($medicineInput, $medicineInput['id']);
        }

        return new MedicineCollection($medicines);
    }
}
