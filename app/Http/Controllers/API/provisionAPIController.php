<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateprovisionAPIRequest;
use App\Http\Requests\API\UpdateprovisionAPIRequest;
use App\Models\provision;
use App\Repositories\provisionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class provisionController
 * @package App\Http\Controllers\API
 */

class provisionAPIController extends InfyOmBaseController
{
    /** @var  provisionRepository */
    private $provisionRepository;

    public function __construct(provisionRepository $provisionRepo)
    {
        $this->provisionRepository = $provisionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/provisions",
     *      summary="Get a listing of the provisions.",
     *      tags={"provision"},
     *      description="Get all provisions",
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
     *                  @SWG\Items(ref="#/definitions/provision")
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
        $this->provisionRepository->pushCriteria(new RequestCriteria($request));
        $this->provisionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $provisions = $this->provisionRepository->all();

        return $this->sendResponse($provisions->toArray(), 'provisions retrieved successfully');
    }

    /**
     * @param CreateprovisionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/provisions",
     *      summary="Store a newly created provision in storage",
     *      tags={"provision"},
     *      description="Store provision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="provision that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/provision")
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
     *                  ref="#/definitions/provision"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateprovisionAPIRequest $request)
    {
        $input = $request->all();

        $provisions = $this->provisionRepository->create($input);

        return $this->sendResponse($provisions->toArray(), 'provision saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/provisions/{id}",
     *      summary="Display the specified provision",
     *      tags={"provision"},
     *      description="Get provision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of provision",
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
     *                  ref="#/definitions/provision"
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
        /** @var provision $provision */
        $provision = $this->provisionRepository->find($id);

        if (empty($provision)) {
            return Response::json(ResponseUtil::makeError('provision not found'), 404);
        }

        return $this->sendResponse($provision->toArray(), 'provision retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateprovisionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/provisions/{id}",
     *      summary="Update the specified provision in storage",
     *      tags={"provision"},
     *      description="Update provision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of provision",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="provision that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/provision")
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
     *                  ref="#/definitions/provision"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateprovisionAPIRequest $request)
    {
        $input = $request->all();

        /** @var provision $provision */
        $provision = $this->provisionRepository->find($id);

        if (empty($provision)) {
            return Response::json(ResponseUtil::makeError('provision not found'), 404);
        }

        $provision = $this->provisionRepository->update($input, $id);

        return $this->sendResponse($provision->toArray(), 'provision updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/provisions/{id}",
     *      summary="Remove the specified provision from storage",
     *      tags={"provision"},
     *      description="Delete provision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of provision",
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
        /** @var provision $provision */
        $provision = $this->provisionRepository->find($id);

        if (empty($provision)) {
            return Response::json(ResponseUtil::makeError('provision not found'), 404);
        }

        $provision->delete();

        return $this->sendResponse($id, 'provision deleted successfully');
    }
}
