# Docker LAMP Setup

This repository provides setup instructions for a LAMP stack using Docker.

## Components:

1. **Apache**
2. **MySQL 8.3**
3. **PhpMyAdmin**
4. **PHP 8.3 (Default)**

### Docker Setup

**Prerequisites:**

1. Check for Docker installation.

   ```bash
   docker -v
   ```

   If not installed, follow the [docker installation guide](https://docs.docker.com/engine/install/ubuntu/).

2. Install the [Docker extension for Visual Studio Code](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker).

**Setup:**

1. Clone the repository.

   ```bash
   git clone https://github.com/dushmanta05/docker-lamp.git
   ```

2. Navigate to the repository.

   ```bash
   cd docker-lamp
   ```

3. Build the Dockerfile.

   ```bash
   docker-compose build
   ```

   Wait for a few minutes (It takes time!).

4. Start the Docker containers.

   ```bash
   docker-compose up -d
   ```

   If you want to see the Docker logs, use the following command.

   ```bash
   docker-compose up
   ```

5. Open your browser and visit:

   - Simple PHP example: [http://localhost:9001/](http://localhost:9001/)
   - PhpMyAdmin: [http://localhost:9002/](http://localhost:9002/)
     - Username: root
     - Password: root

   _Check [docker-compose.yml](docker-compose.yml) file for reference._

6. Run MySQL client.

   ```bash
   docker-compose exec db mysql -u root -p
   ```

## Screenshot

![Example](Documents/Images/screenshot.png)
