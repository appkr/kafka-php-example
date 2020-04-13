<?php

namespace App;

use Kafka\Producer;
use Kafka\ProducerConfig;

class ProducerExample
{
    public function produce()
    {
        $config = ProducerConfig::getInstance();
        $config->setMetadataBrokerList('127.0.0.1:9092');

        $producer = new Producer(
            function() {
                return [
                    [
                        'topic' => 'test-topic',
                        'value' => json_encode(['foo' => 'bar']),
                        'key' => 'testKey',
                    ],
                ];
            }
        );

        $producer->success(function($result) {
            var_dump($result);
        });

        $producer->error(function($errorCode) {
            var_dump($errorCode);
        });

        $producer->send(true);
    }
}

require 'vendor/autoload.php';

$producer = new ProducerExample();
$producer->produce();