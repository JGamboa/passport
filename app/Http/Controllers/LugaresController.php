<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLugaresRequest;
use App\Http\Requests\UpdateLugaresRequest;
use App\Repositories\LugaresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LugaresController extends AppBaseController
{
    /** @var  LugaresRepository */
    private $lugaresRepository;

    public function __construct(LugaresRepository $lugaresRepo)
    {
        $this->lugaresRepository = $lugaresRepo;
    }

    /**
     * Display a listing of the Lugares.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lugaresRepository->pushCriteria(new RequestCriteria($request));
        $lugares = $this->lugaresRepository->all();

        return view('lugares.index')
            ->with('lugares', $lugares);
    }

    /**
     * Show the form for creating a new Lugares.
     *
     * @return Response
     */
    public function create()
    {
        return view('lugares.create');
    }

    /**
     * Store a newly created Lugares in storage.
     *
     * @param CreateLugaresRequest $request
     *
     * @return Response
     */
    public function store(CreateLugaresRequest $request)
    {
        $input = $request->all();

        $lugares = $this->lugaresRepository->create($input);

        Flash::success('Lugares saved successfully.');

        return redirect(route('lugares.index'));
    }

    /**
     * Display the specified Lugares.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lugares = $this->lugaresRepository->findWithoutFail($id);

        if (empty($lugares)) {
            Flash::error('Lugares not found');

            return redirect(route('lugares.index'));
        }

        return view('lugares.show')->with('lugares', $lugares);
    }

    /**
     * Show the form for editing the specified Lugares.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lugares = $this->lugaresRepository->findWithoutFail($id);

        if (empty($lugares)) {
            Flash::error('Lugares not found');

            return redirect(route('lugares.index'));
        }

        return view('lugares.edit')->with('lugares', $lugares);
    }

    /**
     * Update the specified Lugares in storage.
     *
     * @param  int              $id
     * @param UpdateLugaresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLugaresRequest $request)
    {
        $lugares = $this->lugaresRepository->findWithoutFail($id);

        if (empty($lugares)) {
            Flash::error('Lugares not found');

            return redirect(route('lugares.index'));
        }

        $lugares = $this->lugaresRepository->update($request->all(), $id);

        Flash::success('Lugares updated successfully.');

        return redirect(route('lugares.index'));
    }

    /**
     * Remove the specified Lugares from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lugares = $this->lugaresRepository->findWithoutFail($id);

        if (empty($lugares)) {
            Flash::error('Lugares not found');

            return redirect(route('lugares.index'));
        }

        $this->lugaresRepository->delete($id);

        Flash::success('Lugares deleted successfully.');

        return redirect(route('lugares.index'));
    }
}
