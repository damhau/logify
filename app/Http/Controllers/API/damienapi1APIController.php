<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createdamienapi1APIRequest;
use App\Http\Requests\API\Updatedamienapi1APIRequest;
use App\Models\damienapi1;
use App\Repositories\damienapi1Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class damienapi1Controller
 * @package App\Http\Controllers\API
 */

class damienapi1APIController extends InfyOmBaseController
{
    /** @var  damienapi1Repository */
    private $damienapi1Repository;

    public function __construct(damienapi1Repository $damienapi1Repo)
    {
        $this->damienapi1Repository = $damienapi1Repo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/damienapi1s",
     *      summary="Get a listing of the damienapi1s.",
     *      tags={"damienapi1"},
     *      description="Get all damienapi1s",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/damienapi1")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->damienapi1Repository->pushCriteria(new RequestCriteria($request));
        $this->damienapi1Repository->pushCriteria(new LimitOffsetCriteria($request));
        $damienapi1s = $this->damienapi1Repository->all();

        return $this->sendResponse($damienapi1s->toArray(), 'damienapi1s retrieved successfully');
    }

    /**
     * @param Createdamienapi1APIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/damienapi1s",
     *      summary="Store a newly created damienapi1 in storage",
     *      tags={"damienapi1"},
     *      description="Store damienapi1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="damienapi1 that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/damienapi1")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/damienapi1"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createdamienapi1APIRequest $request)
    {
        $input = $request->all();

        $damienapi1s = $this->damienapi1Repository->create($input);
		dd($inpput);
        return $this->sendResponse($damienapi1s->toArray(), 'damienapi1 saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/damienapi1s/{id}",
     *      summary="Display the specified damienapi1",
     *      tags={"damienapi1"},
     *      description="Get damienapi1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of damienapi1",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/damienapi1"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var damienapi1 $damienapi1 */
        $damienapi1 = $this->damienapi1Repository->find($id);

        if (empty($damienapi1)) {
            return Response::json(ResponseUtil::makeError('damienapi1 not found'), 404);
        }

        return $this->sendResponse($damienapi1->toArray(), 'damienapi1 retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatedamienapi1APIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/damienapi1s/{id}",
     *      summary="Update the specified damienapi1 in storage",
     *      tags={"damienapi1"},
     *      description="Update damienapi1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of damienapi1",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="damienapi1 that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/damienapi1")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/damienapi1"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatedamienapi1APIRequest $request)
    {
        $input = $request->all();

        /** @var damienapi1 $damienapi1 */
        $damienapi1 = $this->damienapi1Repository->find($id);

        if (empty($damienapi1)) {
            return Response::json(ResponseUtil::makeError('damienapi1 not found'), 404);
        }

        $damienapi1 = $this->damienapi1Repository->update($input, $id);

        return $this->sendResponse($damienapi1->toArray(), 'damienapi1 updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/damienapi1s/{id}",
     *      summary="Remove the specified damienapi1 from storage",
     *      tags={"damienapi1"},
     *      description="Delete damienapi1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of damienapi1",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var damienapi1 $damienapi1 */
        $damienapi1 = $this->damienapi1Repository->find($id);

        if (empty($damienapi1)) {
            return Response::json(ResponseUtil::makeError('damienapi1 not found'), 404);
        }

        $damienapi1->delete();

        return $this->sendResponse($id, 'damienapi1 deleted successfully');
    }
}
