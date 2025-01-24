<?php

    require_once __DIR__ . '/vendor/autoload.php';
    use PhpAmqpLib\Connection\AMQPStreamConnection;
    use PhpAmqpLib\Message\AMQPMessage;

    $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
    $channel    = $connection->channel();
    $message    = explode(' ', $_POST['message']);

    $channel->exchange_declare('logs', 'fanout', false, false, false);

    $data = implode(' ', array_slice($message, 0));

    if (empty($data)) {
        $data = "info: Hello World!";
    }

    $msg = new AMQPMessage($data);

    $channel->basic_publish($msg, 'logs');

    echo ' [x] Sent ', $data, "\n";

    $channel->close();
    $connection->close();
?>
<br />
<a href="index.html">Back</a>