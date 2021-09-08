<?php

namespace Elephantbox;

class DockerComposeFileGenerator
{
    public $applicationName = '';
    public $hasMysql = false;
    public $hasRedis = false;

    public function __construct($applicationName, $hasMysql, $hasRedis)
    {
        $this->applicationName = $applicationName;
        $this->hasMysql = $hasMysql;
        $this->hasRedis = $hasRedis;
    }

    public function generate()
    {
        ob_start();
        include __DIR__ . '/../stubs/docker-compose.stub.php';
        return ob_get_clean();
    }
}
