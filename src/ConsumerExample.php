<?php

namespace App;

use Kafka\Consumer;
use Kafka\ConsumerConfig;

class ConsumerExample
{
    public function consume()
    {
        $config = ConsumerConfig::getInstance();
        $config->setMetadataBrokerList('127.0.0.1:9092');
        $config->setGroupId('test-group');
        $config->setTopics(['test-topic']);

        $consumer = new Consumer();

        $consumer->start(function($topic, $part, $message) {
            var_dump($message);
        });
    }
}

require 'vendor/autoload.php';

$consumer = new ConsumerExample();
$consumer->consume();
