<?php
namespace App\Provider;

use App\Middleware;
use Pimple\ServiceProviderInterface;
use Pimple\Container;
use App;
use Azura;
use App\Entity;

class MiddlewareProvider implements ServiceProviderInterface
{
    public function register(Container $di)
    {
        $di[Middleware\EnforceSecurity::class] = function($di) {
            return new Middleware\EnforceSecurity(
                $di[\Doctrine\ORM\EntityManager::class],
                $di[Azura\Assets::class]
            );
        };

        $di[Middleware\GetCurrentUser::class] = function($di) {
            return new Middleware\GetCurrentUser(
                $di[App\Auth::class],
                $di[App\Customization::class]
            );
        };

        $di[Middleware\GetStation::class] = function($di) {
            /** @var \Doctrine\ORM\EntityManager $em */
            $em = $di[\Doctrine\ORM\EntityManager::class];

            /** @var Entity\Repository\StationRepository $station_repo */
            $station_repo = $em->getRepository(Entity\Station::class);

            return new Middleware\GetStation(
                $station_repo,
                $di[App\Radio\Adapters::class]
            );
        };

        $di[Middleware\Permissions::class] = function($di) {
            return new Middleware\Permissions(
                $di[App\Acl::class]
            );
        };

        /*
         * Module-specific middleware
         */

        $di[Middleware\Module\Admin::class] = function($di) {
            return new Middleware\Module\Admin(
                $di[App\Acl::class],
                $di[Azura\EventDispatcher::class]
            );
        };

        $di[Middleware\Module\Api::class] = function($di) {
            /** @var \Doctrine\ORM\EntityManager $em */
            $em = $di[\Doctrine\ORM\EntityManager::class];

            /** @var Entity\Repository\ApiKeyRepository $api_repo */
            $api_repo = $em->getRepository(Entity\ApiKey::class);

            /** @var Entity\Repository\SettingsRepository $settings_repo */
            $settings_repo = $em->getRepository(Entity\Settings::class);

            return new Middleware\Module\Api(
                $di[Azura\Session::class],
                $api_repo,
                $settings_repo
            );
        };

        $di[Middleware\Module\Stations::class] = function($di) {
            return new Middleware\Module\Stations(
                $di[App\Acl::class],
                $di[Azura\EventDispatcher::class]
            );
        };

        $di[Middleware\Module\StationFiles::class] = function($di) {
            return new Middleware\Module\StationFiles;
        };
    }
}
