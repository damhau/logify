<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Createdamienapi1Request;
use App\Http\Requests\Updatedamienapi1Request;
use App\Repositories\damienapi1Repository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class damienapi1Controller extends InfyOmBaseController
{
    /** @var  damienapi1Repository */
    private $damienapi1Repository;

    public function __construct(damienapi1Repository $damienapi1Repo)
    {
        $this->damienapi1Repository = $damienapi1Repo;
    }

    /**
     * Display a listing of the damienapi1.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->damienapi1Repository->pushCriteria(new RequestCriteria($request));
        $damienapi1s = $this->damienapi1Repository->all();

        return view('damienapi1s.index')
            ->with('damienapi1s', $damienapi1s);
    }

    /**
     * Show the form for creating a new damienapi1.
     *
     * @return Response
     */
    public function create()
    {
        return view('damienapi1s.create');
    }

    /**
     * Store a newly created damienapi1 in storage.
     *
     * @param Createdamienapi1Request $request
     *
     * @return Response
     */
    public function store(Createdamienapi1Request $request)
    {
        $input = $request->all();

        $damienapi1 = $this->damienapi1Repository->create($input);

        Flash::success('damienapi1 saved successfully.');

        return redirect(route('damienapi1s.index'));
    }

    /**
     * Display the specified damienapi1.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $damienapi1 = $this->damienapi1Repository->findWithoutFail($id);

        if (empty($damienapi1)) {
            Flash::error('damienapi1 not found');

            return redirect(route('damienapi1s.index'));
        }

        return view('damienapi1s.show')->with('damienapi1', $damienapi1);
    }

    /**
     * Show the form for editing the specified damienapi1.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $damienapi1 = $this->damienapi1Repository->findWithoutFail($id);

        if (empty($damienapi1)) {
            Flash::error('damienapi1 not found');

            return redirect(route('damienapi1s.index'));
        }

        return view('damienapi1s.edit')->with('damienapi1', $damienapi1);
    }

    /**
     * Update the specified damienapi1 in storage.
     *
     * @param  int              $id
     * @param Updatedamienapi1Request $request
     *
     * @return Response
     */
    public function update($id, Updatedamienapi1Request $request)
    {
        $damienapi1 = $this->damienapi1Repository->findWithoutFail($id);

        if (empty($damienapi1)) {
            Flash::error('damienapi1 not found');

            return redirect(route('damienapi1s.index'));
        }

        $damienapi1 = $this->damienapi1Repository->update($request->all(), $id);

        Flash::success('damienapi1 updated successfully.');

        return redirect(route('damienapi1s.index'));
    }

    /**
     * Remove the specified damienapi1 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $damienapi1 = $this->damienapi1Repository->findWithoutFail($id);

        if (empty($damienapi1)) {
            Flash::error('damienapi1 not found');

            return redirect(route('damienapi1s.index'));
        }

        $this->damienapi1Repository->delete($id);

        Flash::success('damienapi1 deleted successfully.');

        return redirect(route('damienapi1s.index'));
    }
}
