<?php
use PhpAmqpLib\Connection\AMQPStreamConnection;

class AqmpConsumer
{
    public function consume()
    {
        $config = \ToilonShop\config\Main::getConfig()['rabbitmq'];
        $exchange = 'router';
        $queue = 'auth_message';
        $consumerTag = 'consumer';
        $connection = new AMQPStreamConnection($config['host'], $config['port'], $config['user'], $config['pass'], $config['vhost']);
        $channel = $connection->channel();
        $channel->queue_declare($queue, false, true, false, false);
        $channel->exchange_declare($exchange, 'direct', false, true, false);
        $channel->queue_bind($queue, $exchange);
        /**
         * @param \PhpAmqpLib\Message\AMQPMessage $message
         */
        function process_message($message)
        {
            echo "\n--------\n";
            echo $message->body;
            sleep(10);

            echo "\n--------\n";
            $message->delivery_info['channel']->basic_ack($message->delivery_info['delivery_tag']);
            // Send a message with the string "quit" to cancel the consumer.
            if ($message->body === 'quit') {
                $message->delivery_info['channel']->basic_cancel($message->delivery_info['consumer_tag']);
            }
        }

        $channel->basic_consume($queue, $consumerTag, false, false, false, false, 'process_message');
        /**
         * @param \PhpAmqpLib\Channel\AMQPChannel $channel
         * @param \PhpAmqpLib\Connection\AbstractConnection $connection
         */
        function shutdown($channel, $connection)
        {
            $channel->close();
            $connection->close();
        }

        register_shutdown_function('shutdown', $channel, $connection);
// Loop as long as the channel has callbacks registered
        while (count($channel->callbacks)) {
            $channel->wait();
        }
    }
}