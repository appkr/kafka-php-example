## kafka-php-example

Clone the project
```bash
$ git clone git@github.com:appkr/kafka-php-example.git
$ cd kafka-php-example
~/kafka-php-example $ composer install
```

Run Kafka
```bash
~/kafka-php-example $ docker-compose -f kafka.yml up
```

Create Topic
```bash
~/kafka-php-example $ docker exec -it kafka-php-example_kafka_1 /opt/kafka/bin/kafka-topics.sh --create --replication-factor 1 --partitions 1 --zookeeper zookeeper:2181 --topic test-topic
~/kafka-php-example $ docker exec -it kafka-php-example_kafka_1 /opt/kafka/bin/kafka-topics.sh --zookeeper zookeeper:2181 --alter --topic test-topic --config retention.ms=3600000
```

Produce a message
```bash
~/kafka-php-example $ php src/ProducerExample.php
# ~/kafka-php-example/src/ProducerExample.php:28:
# array(2) {
#   'throttleTime' =>
#   int(0)
#   'data' =>
#   array(1) {
#     [0] =>
#     array(2) {
#       'topicName' =>
#       string(10) "test-topic"
#       'partitions' =>
#       array(1) {
#         ...
#       }
#     }
#   }
# }
```

Consume a message
```bash
~/kafka-php-example $ php src/ConsumerExample.php
# ~/kafka-php-example/src/ConsumerExample.php:20:
# array(3) {
#   'offset' =>
#   int(0)
#   'size' =>
#   int(42)
#   'message' =>
#   array(6) {
#     'crc' =>
#     int(936545731)
#     'magic' =>
#     int(1)
#     'attr' =>
#     int(0)
#     'timestamp' =>
#     int(-1)
#     'key' =>
#     string(7) "testKey"
#     'value' =>
#     string(13) "{"foo":"bar"}"
#   }
# }
```
