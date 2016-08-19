<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateprovisionRequest;
use App\Http\Requests\UpdateprovisionRequest;
use App\Repositories\provisionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class provisionController extends InfyOmBaseController
{
    /** @var  provisionRepository */
    private $provisionRepository;

    public function __construct(provisionRepository $provisionRepo)
    {
        $this->middleware('auth');
		$this->provisionRepository = $provisionRepo;
    }

    /**
     * Display a listing of the provision.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->provisionRepository->pushCriteria(new RequestCriteria($request));
        $provisions = $this->provisionRepository->all();

        return view('provisions.index')
            ->with('provisions', $provisions);
    }

    /**
     * Show the form for creating a new provision.
     *
     * @return Response
     */
    public function create()
    {
        return view('provisions.create');
    }

    /**
     * Store a newly created provision in storage.
     *
     * @param CreateprovisionRequest $request
     *
     * @return Response
     */
    public function store(CreateprovisionRequest $request)
    {
        $input = $request->all();

        $provision = $this->provisionRepository->create($input);

        Flash::success('provision saved successfully.');

        return redirect(route('provisions.index'));
    }

    /**
     * Display the specified provision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $provision = $this->provisionRepository->findWithoutFail($id);

        if (empty($provision)) {
            Flash::error('provision not found');

            return redirect(route('provisions.index'));
        }

        return view('provisions.show')->with('provision', $provision);
    }

    /**
     * Show the form for editing the specified provision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $provision = $this->provisionRepository->findWithoutFail($id);

        if (empty($provision)) {
            Flash::error('provision not found');

            return redirect(route('provisions.index'));
        }

        return view('provisions.edit')->with('provision', $provision);
    }

    /**
     * Update the specified provision in storage.
     *
     * @param  int              $id
     * @param UpdateprovisionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprovisionRequest $request)
    {
        $provision = $this->provisionRepository->findWithoutFail($id);

        if (empty($provision)) {
            Flash::error('provision not found');

            return redirect(route('provisions.index'));
        }

        $provision = $this->provisionRepository->update($request->all(), $id);

        Flash::success('provision updated successfully.');

        return redirect(route('provisions.index'));
    }

    /**
     * Remove the specified provision from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $provision = $this->provisionRepository->findWithoutFail($id);

        if (empty($provision)) {
            Flash::error('provision not found');

            return redirect(route('provisions.index'));
        }

        $this->provisionRepository->delete($id);

        Flash::success('provision deleted successfully.');

        return redirect(route('provisions.index'));
    }
}
