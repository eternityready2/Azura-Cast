<?php

declare(strict_types=1);

namespace App\Controller\Api\Stations\Podcasts\Files;

use App\Entity\PodcastMedia;
use App\Entity\Repository\StationRepository;
use App\Flysystem\StationFilesystems;
use App\Http\Response;
use App\Http\ServerRequest;
use App\Paginator;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ResponseInterface;

class ListAction
{
    public function __invoke(
        ServerRequest $request,
        Response $response,
        EntityManagerInterface $em,
        StationRepository $stationRepo
    ): ResponseInterface {
        $station = $request->getStation();
        $router = $request->getRouter();

        $stationFilesystems = new StationFilesystems($station);
        $podcastsFilesystem = $stationFilesystems->getPodcastsFilesystem();

        $searchPhrase = trim($request->getParam('searchPhrase', ''));

        $podcastMediaQueryBuilder = $em->createQueryBuilder()
            ->select('pm, e')
            ->from(PodcastMedia::class, 'pm')
            ->leftJoin('pm.episode', 'e')
            ->where('pm.storage_location = :storageLocation')
            ->setParameter('storageLocation', $station->getPodcastsStorageLocation());

        if (!empty($searchPhrase)) {
            $podcastMediaQueryBuilder->andWhere('(pm.original_name LIKE :query)')
                ->setParameter('query', '%' . $searchPhrase . '%');
        }

        $paginator = Paginator::fromQueryBuilder($podcastMediaQueryBuilder, $request);

        $paginator->setPostprocessor(
            function (PodcastMedia $podcastMedia) use ($station, $podcastsFilesystem, $router) {
                return [
                    'id' => $podcastMedia->getId(),
                    'path' => $podcastMedia->getPath(),
                    'length' => $podcastMedia->getLength(),
                    'length_text' => $podcastMedia->getLengthText(),
                    'original_name' => $podcastMedia->getOriginalName(),
                    'art' => (string)$router->named(
                        'api:stations:podcasts:media:art',
                        [
                            'station_id' => $station->getId(),
                            'podcast_media_id' => $podcastMedia->getId() . '|' . $podcastMedia->getArtUpdatedAt(),
                        ]
                    ),
                    'size' => $podcastsFilesystem->fileSize($podcastMedia->getPath()),
                    'modified_at' => $podcastMedia->getModifiedTime(),
                    'is_dir' => false,
                    'links' => [
                        'play' => (string)$router->named(
                            'api:stations:podcasts:files:download',
                            [
                                'station_id' => $station->getId(),
                                'podcast_media_id' => $podcastMedia->getId(),
                            ],
                            [],
                            true
                        ),
                        'delete' => $router->fromHere(
                            'api:stations:podcasts:files:delete',
                            ['podcast_media_id' => $podcastMedia->getId()]
                        ),
                    ],
                ];
            }
        );

        return $paginator->write($response);
    }
}
