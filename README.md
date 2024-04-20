<h1 align="center">Pokemons</h1>

## Development Setup

-   Install [Docker](https://www.docker.com/) by following the installation [instructions](https://www.docker.com/get-started/)

### Setting Up a Project

1. Clone this repository

    ```bash
    git clone -b feature/converter git@github.com:AndreyDevWork/pokemons-backend.git
    ```

2. Init project by Makefile command

    ```bash
    make project-init
    ```

3. install Passport, необходимо скопировать Client ID и Client secret от Password grant client в .env в фронтенд приложение

    ```bash
    make passport-install
    ```

-   The application is available at http://localhost:8080/
-   The documentation REST API is available at http://localhost:8080/api/documentation
-   The Laravel Telescope is available at http://localhost:8080/telescope

### Available Services

-   php:8.2.11
-   NGINX
-   PostgreSQL
-   pgAdmin:
-   elasticsearch
