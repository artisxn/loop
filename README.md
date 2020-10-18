## Setup

Ensure that docker is installed and set up on your system.

[https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)

To build images run below command in project root:

```
docker-compose build
docker-compose run --rm artisan migrate
docker-compose run --rm artisan db:seed
```

## Running

To run backend & frontend locally run:

```
docker-compose up -d site queue
```

Interacting with artisan:

```
docker-compose run --rm artisan [command]
```

Interacting with composer:

```
docker-compose run --rm composer [command]
```

Interacting with npm:

```
docker-compose run --rm npm [command]
```

## Testing

Backend

```
docker-compose run --rm artisan test
```

Frontend

```
docker-composer run --rm cypress
docker-composer run --rm unit
```
