<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLugaresAPIRequest;
use App\Http\Requests\API\UpdateLugaresAPIRequest;
use App\Models\Lugares;
use App\Repositories\LugaresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LugaresController
 * @package App\Http\Controllers\API
 */

class LugaresAPIController extends AppBaseController
{
    /** @var  LugaresRepository */
    private $lugaresRepository;

    public function __construct(LugaresRepository $lugaresRepo)
    {
        $this->lugaresRepository = $lugaresRepo;
    }

    /**
     * Display a listing of the Lugares.
     * GET|HEAD /lugares
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lugaresRepository->pushCriteria(new RequestCriteria($request));
        $this->lugaresRepository->pushCriteria(new LimitOffsetCriteria($request));
        $lugares = $this->lugaresRepository->all();

        return $this->sendResponse($lugares->toArray(), 'Lugares retrieved successfully');
    }

    /**
     * Store a newly created Lugares in storage.
     * POST /lugares
     *
     * @param CreateLugaresAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLugaresAPIRequest $request)
    {
        $input = $request->all();

        $lugares = $this->lugaresRepository->create($input);

        return $this->sendResponse($lugares->toArray(), 'Lugares saved successfully');
    }

    /**
     * Display the specified Lugares.
     * GET|HEAD /lugares/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Lugares $lugares */
        $lugares = $this->lugaresRepository->findWithoutFail($id);

        if (empty($lugares)) {
            return $this->sendError('Lugares not found');
        }

        return $this->sendResponse($lugares->toArray(), 'Lugares retrieved successfully');
    }

    /**
     * Update the specified Lugares in storage.
     * PUT/PATCH /lugares/{id}
     *
     * @param  int $id
     * @param UpdateLugaresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLugaresAPIRequest $request)
    {
        $input = $request->all();

        /** @var Lugares $lugares */
        $lugares = $this->lugaresRepository->findWithoutFail($id);

        if (empty($lugares)) {
            return $this->sendError('Lugares not found');
        }

        $lugares = $this->lugaresRepository->update($input, $id);

        return $this->sendResponse($lugares->toArray(), 'Lugares updated successfully');
    }

    /**
     * Remove the specified Lugares from storage.
     * DELETE /lugares/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Lugares $lugares */
        $lugares = $this->lugaresRepository->findWithoutFail($id);

        if (empty($lugares)) {
            return $this->sendError('Lugares not found');
        }

        $lugares->delete();

        return $this->sendResponse($id, 'Lugares deleted successfully');
    }
}
