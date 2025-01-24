# RabbitMQ Publish/Subscribe Queue

PHP simplest study on RabbitMQ publish/subscribe queue, with a basic UI for emitting logs. 

## How to run

### Run RabbitMQ
docker run -it --rm --name rabbitmq -p 5672:5672 -p 15672:15672 rabbitmq:4.0-management

### To save logs in a file
php receive_logs.php > logs_from_rabbit.log

### To receive logs on the screen
php receive_logs.php (supports multiple consoles)

### To emit logs
Navigate to index.html and emit a log.
