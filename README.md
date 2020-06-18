# REST Client

Laravel Framework based REST Client. Provade flexible and user friendly mobile UI for:
* Manage projects
* Manage clients and related persons, related contragents
* Fully trackable changes - who (user), what (create, update, delete) and when (time) change record
* Manage tasks
* Google maps integration to proper display addresses
* Calendar with events
* Export data to excel and pdf

## Getting Started

Download files in your web server directory and extract them. Before you run application you need to have installed 
wamp server or any other web server pack. MySQL is also required.  

### Docker containerization

This application can be run with docker. Download and install [Docker](https://www.docker.com)
In main directory create .env file using env.example:

```
cp .env.example .env
```

Next run following command:

```
docker-compose up --build
```

This command will create and run docker container and service with name crm-client_app.
Next you have to enter in container to run composer command and install all dependencies:

```
docker exec -it crm-client_app bash
```

Then run:
```
composer install
```

After successfully run this command you also need to run:

```
php artisan key:generate
```

### Installing locally

Download files in your web server directory and extract them. Create database on MySQL and configure database credentials according to your local environment. Also you will need to install [Composer](https://getcomposer.org/download/) to proper manage project dependencies. 
In main directory create .env file and set:

```
SERVER_URI=YOU_API_HOST
```

On main project directory start your console and run:

```
composer update
```

After successfully run this command you also need to run:
```
php artisan key:generate
```

You may need to configure and new virtual host on your web server to serve this project. After this configuration restart your server and load your project. You have to see login page where you can enter this credentials for admin access:
* username: demo@client.com
* password: testclient


## Built With

* [Laravel Framework](https://laravel.com)
* [Material Design for Bootstrap](https://mdbootstrap.com/) - Framework for building responsive, mobile-first websites and apps 
* [jQuery](https://jquery.com/) - JavaScript library
* [Pusher](https://pusher.com/) - Build scalable realtime apps
* [Vue.js](https://vuejs.org/) - JavaScript Framework

## Author

* **Plamen Petrov** - [PlamenPetrov](https://github.com/plamenpetrov)

## License

This project is licensed under the MIT License.
