<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createlogify_provisionAPIRequest;
use App\Http\Requests\API\Updatelogify_provisionAPIRequest;
use App\Models\logify_provision;
use App\Repositories\logify_provisionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class logify_provisionController
 * @package App\Http\Controllers\API
 */

class logify_provisionAPIController extends InfyOmBaseController
{
    /** @var  logify_provisionRepository */
    private $logifyProvisionRepository;

    public function __construct(logify_provisionRepository $logifyProvisionRepo)
    {
        $this->logifyProvisionRepository = $logifyProvisionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/logifyProvisions",
     *      summary="Get a listing of the logify_provisions.",
     *      tags={"logify_provision"},
     *      description="Get all logify_provisions",
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
     *                  @SWG\Items(ref="#/definitions/logify_provision")
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
        $this->logifyProvisionRepository->pushCriteria(new RequestCriteria($request));
        $this->logifyProvisionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $logifyProvisions = $this->logifyProvisionRepository->all();

        return $this->sendResponse($logifyProvisions->toArray(), 'logify_provisions retrieved successfully');
    }

    /**
     * @param Createlogify_provisionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/logifyProvisions",
     *      summary="Store a newly created logify_provision in storage",
     *      tags={"logify_provision"},
     *      description="Store logify_provision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="logify_provision that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/logify_provision")
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
     *                  ref="#/definitions/logify_provision"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createlogify_provisionAPIRequest $request)
    {
        $input = $request->all();

        $logifyProvisions = $this->logifyProvisionRepository->create($input);

        return $this->sendResponse($logifyProvisions->toArray(), 'logify_provision saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/logifyProvisions/{id}",
     *      summary="Display the specified logify_provision",
     *      tags={"logify_provision"},
     *      description="Get logify_provision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of logify_provision",
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
     *                  ref="#/definitions/logify_provision"
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
        /** @var logify_provision $logifyProvision */
        $logifyProvision = $this->logifyProvisionRepository->find($id);

        if (empty($logifyProvision)) {
            return Response::json(ResponseUtil::makeError('logify_provision not found'), 404);
        }

        return $this->sendResponse($logifyProvision->toArray(), 'logify_provision retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatelogify_provisionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/logifyProvisions/{id}",
     *      summary="Update the specified logify_provision in storage",
     *      tags={"logify_provision"},
     *      description="Update logify_provision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of logify_provision",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="logify_provision that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/logify_provision")
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
     *                  ref="#/definitions/logify_provision"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatelogify_provisionAPIRequest $request)
    {
        $input = $request->all();

        /** @var logify_provision $logifyProvision */
        $logifyProvision = $this->logifyProvisionRepository->find($id);

        if (empty($logifyProvision)) {
            return Response::json(ResponseUtil::makeError('logify_provision not found'), 404);
        }

        $logifyProvision = $this->logifyProvisionRepository->update($input, $id);

        return $this->sendResponse($logifyProvision->toArray(), 'logify_provision updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/logifyProvisions/{id}",
     *      summary="Remove the specified logify_provision from storage",
     *      tags={"logify_provision"},
     *      description="Delete logify_provision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of logify_provision",
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
        /** @var logify_provision $logifyProvision */
        $logifyProvision = $this->logifyProvisionRepository->find($id);

        if (empty($logifyProvision)) {
            return Response::json(ResponseUtil::makeError('logify_provision not found'), 404);
        }

        $logifyProvision->delete();

        return $this->sendResponse($id, 'logify_provision deleted successfully');
    }
}
