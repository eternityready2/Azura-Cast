<?php
namespace AzuraCast\Sync;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

abstract class SyncAbstract
{
    /**
     * @var ContainerInterface
     */
    protected $di;

    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(ContainerInterface $di)
    {
        $this->di = $di;
        $this->em = $di['em'];
    }

    abstract public function run();

    protected function _logMemoryUsage()
    {
        $memory_bytes = memory_get_usage();

        $unit=array('b','kb','mb','gb','tb','pb');
        $memory = @round($memory_bytes/pow(1024,($i=floor(log($memory_bytes,1024)))),2).' '.$unit[$i];

        \App\Debug::print_r('Free memory: '.$memory);
    }
}