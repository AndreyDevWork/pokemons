<h1 align="center">Converter REST API</h1>

## Development Setup

-   Install [Docker](https://www.docker.com/) by following the installation [instructions](https://www.docker.com/get-started/)
-   Ensure that your operating system is Linux, and the GNU Make utility is installed. You can install it by running the following commands:
    ```bash
    sudo apt-get install make
    ```

### Setting Up a Project

1. Clone this repository

    ```bash
    git clone -b feature/converter git@github.com:AndreyDevWork/pokemons.git
    ```

2. Init project by Makefile command

    ```bash
    make project-init
    ```

3. install Passport

    ```bash
    make passport-install
    ```

-   The application is available at http://localhost:8080/
-   The documentation REST API is available at http://localhost:8080/api/documentation

#### Project Description: Converter REST API

The Converter REST API serves as the backend infrastructure
to facilitate the functionalities required for the Converter Frontend application.
It handles data processing, communication with the database, and serves
as the intermediary between the frontend and the server.
