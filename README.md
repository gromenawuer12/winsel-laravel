docker run --rm  --volume $PWD/src:/app composer install
docker run --rm  --volume $PWD/src:/app composer dump-autoload