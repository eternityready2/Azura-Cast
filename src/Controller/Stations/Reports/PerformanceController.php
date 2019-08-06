<?php
namespace App\Controller\Stations\Reports;

use App\Sync\Task\RadioAutomation;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PerformanceController
{
    /** @var EntityManager */
    protected $em;

    /** @var RadioAutomation */
    protected $sync_automation;

    /**
     * @param EntityManager $em
     * @param RadioAutomation $sync_automation
     * @see \App\Provider\StationsProvider
     */
    public function __construct(EntityManager $em, RadioAutomation $sync_automation)
    {
        $this->em = $em;
        $this->sync_automation = $sync_automation;
    }

    public function __invoke(Request $request, Response $response, $station_id, $format = 'html'): ResponseInterface
    {
        $station = \App\Http\RequestHelper::getStation($request);

        $automation_config = (array)$station->getAutomationSettings();
        $threshold_days = (int)($automation_config['threshold_days'] ?? RadioAutomation::DEFAULT_THRESHOLD_DAYS);

        $report_data = $this->sync_automation->generateReport($station, $threshold_days);

        // Do not show songs that are not in playlists.
        $report_data = array_filter($report_data, function ($media) {
            if (empty($media['playlists'])) {
                return false;
            }

            return true;
        });

        if ($format === 'csv') {
            $export_csv = [
                [
                    'Song Title',
                    'Song Artist',
                    'Filename',
                    'Length',
                    'Current Playlist',
                    'Delta Joins',
                    'Delta Losses',
                    'Delta Total',
                    'Play Count',
                    'Play Percentage',
                    'Weighted Ratio',
                ]
            ];

            foreach ($report_data as $row) {
                $export_csv[] = [
                    $row['title'],
                    $row['artist'],
                    $row['path'],
                    $row['length'],

                    implode('/', $row['playlists']),
                    $row['delta_positive'],
                    $row['delta_negative'],
                    $row['delta_total'],

                    $row['num_plays'],
                    $row['percent_plays'] . '%',
                    $row['ratio'],
                ];
            }

            $csv_file = \Azura\Utilities\Csv::arrayToCsv($export_csv);
            $csv_filename = $station->getShortName() . '_media_' . date('Ymd') . '.csv';

            return $response->renderStringAsFile($csv_file, 'text/csv', $csv_filename);
        }

        if ($format === 'json') {
            return $response->withJson($report_data);
        }

        return \App\Http\RequestHelper::getView($request)->renderToResponse($response, 'stations/reports/performance', [
            'report_data' => $report_data,
        ]);
    }
}
