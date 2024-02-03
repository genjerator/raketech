## Raketech test API

Backend (Laravel)
The backend should fetch the country names and flag images (only URLs, no need to
store files) from this API https://restcountries.com/ and serve them properly from the
respective controller, ideally while using common PHP/Laravel design patterns. Keep
in mind that since it’s based on an external API, the implementation should be made
in such a way that the API could easily be replaced if needed. Though there is no need
for local storage (database or otherwise), bonus points will be awarded for the
implementation of the caching mechanism of your choice.

The project was created using laravel sail. Sail is the docker-compose.yml file and the sail script that is stored at the root of the project.
The sail script provides a CLI with convenient methods for interacting with the Docker containers defined by the docker-compose.yml file.

### Steps to run the backed
````
git clone git@github.com:genjerator/raketech.git
cd raketech
````
It is importan to run following command in order to get vendor files:
````
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/opt \
-w /opt \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
````
Create .env file based by .env.example
``cp .env.example .env``

``sail up -d`` in order to create docker containers

The api for listing countries is:
``http://localhost/api/v1/countries``

**Note:**
if the port 80 is already being used set another port number in the .env:\
APP_PORT=8080  
FORWARD_DB_PORT=3307
