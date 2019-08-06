<?php
namespace App\Controller\Api\Stations;

use App\Entity;
use App\Entity\StationRemote;
use OpenApi\Annotations as OA;

/**
 * @see \App\Provider\ApiProvider
 */
class RemotesController extends AbstractStationApiCrudController
{
    protected $entityClass = Entity\StationRemote::class;
    protected $resourceRouteName = 'api:stations:remote';

    /**
     * @OA\Get(path="/station/{station_id}/remotes",
     *   tags={"Stations: Remote Relays"},
     *   description="List all current remote relays.",
     *   @OA\Parameter(ref="#/components/parameters/station_id_required"),
     *   @OA\Response(response=200, description="Success",
     *     @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/StationRemote"))
     *   ),
     *   @OA\Response(response=403, description="Access denied"),
     *   security={{"api_key": {}}},
     * )
     *
     * @OA\Post(path="/station/{station_id}/remotes",
     *   tags={"Stations: Remote Relays"},
     *   description="Create a new remote relay.",
     *   @OA\Parameter(ref="#/components/parameters/station_id_required"),
     *   @OA\RequestBody(
     *     @OA\JsonContent(ref="#/components/schemas/StationRemote")
     *   ),
     *   @OA\Response(response=200, description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/StationRemote")
     *   ),
     *   @OA\Response(response=403, description="Access denied"),
     *   security={{"api_key": {}}},
     * )
     *
     * @OA\Get(path="/station/{station_id}/remote/{id}",
     *   tags={"Stations: Remote Relays"},
     *   description="Retrieve details for a single remote relay.",
     *   @OA\Parameter(ref="#/components/parameters/station_id_required"),
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Remote Relay ID",
     *     required=true,
     *     @OA\Schema(type="integer", format="int64")
     *   ),
     *   @OA\Response(response=200, description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/StationRemote")
     *   ),
     *   @OA\Response(response=403, description="Access denied"),
     *   security={{"api_key": {}}},
     * )
     *
     * @OA\Put(path="/station/{station_id}/remote/{id}",
     *   tags={"Stations: Remote Relays"},
     *   description="Update details of a single remote relay.",
     *   @OA\RequestBody(
     *     @OA\JsonContent(ref="#/components/schemas/StationRemote")
     *   ),
     *   @OA\Parameter(ref="#/components/parameters/station_id_required"),
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Remote Relay ID",
     *     required=true,
     *     @OA\Schema(type="integer", format="int64")
     *   ),
     *   @OA\Response(response=200, description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/Api_Status")
     *   ),
     *   @OA\Response(response=403, description="Access denied"),
     *   security={{"api_key": {}}},
     * )
     *
     * @OA\Delete(path="/station/{station_id}/remote/{id}",
     *   tags={"Stations: Remote Relays"},
     *   description="Delete a single remote relay.",
     *   @OA\Parameter(ref="#/components/parameters/station_id_required"),
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Remote Relay ID",
     *     required=true,
     *     @OA\Schema(type="integer", format="int64")
     *   ),
     *   @OA\Response(response=200, description="Success",
     *     @OA\JsonContent(ref="#/components/schemas/Api_Status")
     *   ),
     *   @OA\Response(response=403, description="Access denied"),
     *   security={{"api_key": {}}},
     * )
     */

    /**
     * @inheritDoc
     */
    protected function _getRecord(Entity\Station $station, $record_id)
    {
        $record = parent::_getRecord($station, $record_id);

        if ($record instanceof StationRemote && !$record->isEditable()) {
            throw new \App\Exception\PermissionDenied('This record cannot be edited.');
        }

        return $record;
    }
}
