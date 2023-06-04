## About Project
Game library powered by [IGDB](https://www.igdb.com/) & built using [HALT Stack](https://haltstack.dev/)

## Getting Started
These instructions will give you a copy of the project and running on your local machine for development and testing purposes. 

### Prerequisites
To run this project locally, you need:

- **PHP** >= 8.2.6
- **Laravel** >= 10.13.0
- **Composer** >= 2.5.5

*You can find the installation instructions for these dependencies on their respective websites.*

## Installing
**Clone the repo**
```
git clone https://github.com/k-karina-n/igdb-library.git
```
**Rename .env.example file to .env inside a project root and add the following information** 
```
IGDB_ID=tip8w5sp2acwrlfg3l0odgc3o09jm2
IGDB_TOKEN='Bearer 5zj54zbmp0nnr1pq0co1utw4kpqd2s'
```

**Open the console and go to a project root directory**
```
cd igdb-library
```

**Create dependencies**
```
composer install
composer dump-autoload
```
**Generate an application encryption key** 
```
php artisan key:generate
```

**Install packages and bundle application's assets**
```
npm i
npm run build
```

**Run project**
```
php artisan serve
```