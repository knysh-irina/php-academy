<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class AqmpSender
{
    public function send($body)
    {
        $config = \ToilonShop\config\Main::getConfig()['rabbitmq'];
        $exchange = 'router';
        $queue = 'auth_message';
        $connection = new AMQPStreamConnection($config['host'], $config['port'], $config['user'], $config['pass'], $config['vhost']);
        $channel = $connection->channel();
        $channel->queue_declare($queue, false, true, false, false);
        $channel->exchange_declare($exchange, 'direct', false, true, false);
        $channel->queue_bind($queue, $exchange);

        $messageBody = implode(' ', array_slice($body, 1));
        $message = new AMQPMessage($messageBody, array('content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
        $channel->basic_publish($message, $exchange);
        $channel->close();
        $connection->close();
    }
}


