<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProbeRequest;
use App\Http\Requests\UpdateProbeRequest;
use App\Repositories\ProbeRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProbeController extends InfyOmBaseController
{
    /** @var  ProbeRepository */
    private $probeRepository;

    public function __construct(ProbeRepository $probeRepo)
    {
        $this->middleware('auth');
		$this->probeRepository = $probeRepo;
    }

    /**
     * Display a listing of the Probe.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->probeRepository->pushCriteria(new RequestCriteria($request));
        $probes = $this->probeRepository->all();

        return view('probes.index')
            ->with('probes', $probes);
    }

    /**
     * Show the form for creating a new Probe.
     *
     * @return Response
     */
    public function create()
    {
        return view('probes.create');
    }

    /**
     * Store a newly created Probe in storage.
     *
     * @param CreateProbeRequest $request
     *
     * @return Response
     */
    public function store(CreateProbeRequest $request)
    {
        $input = $request->all();

        $probe = $this->probeRepository->create($input);

        Flash::success('Probe saved successfully.');

        return redirect(route('probes.index'));
    }

    /**
     * Display the specified Probe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $probe = $this->probeRepository->findWithoutFail($id);

        if (empty($probe)) {
            Flash::error('Probe not found');

            return redirect(route('probes.index'));
        }

        return view('probes.show')->with('probe', $probe);
    }

    /**
     * Show the form for editing the specified Probe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $probe = $this->probeRepository->findWithoutFail($id);

        if (empty($probe)) {
            Flash::error('Probe not found');

            return redirect(route('probes.index'));
        }

        return view('probes.edit')->with('probe', $probe);
    }

    /**
     * Update the specified Probe in storage.
     *
     * @param  int              $id
     * @param UpdateProbeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProbeRequest $request)
    {
        $probe = $this->probeRepository->findWithoutFail($id);

        if (empty($probe)) {
            Flash::error('Probe not found');

            return redirect(route('probes.index'));
        }

        $probe = $this->probeRepository->update($request->all(), $id);

        Flash::success('Probe updated successfully.');

        return redirect(route('probes.index'));
    }

    /**
     * Remove the specified Probe from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $probe = $this->probeRepository->findWithoutFail($id);

        if (empty($probe)) {
            Flash::error('Probe not found');

            return redirect(route('probes.index'));
        }

        $this->probeRepository->delete($id);

        Flash::success('Probe deleted successfully.');

        return redirect(route('probes.index'));
    }
}
