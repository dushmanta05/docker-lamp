# Docker LAMP Setup

This directory provides a ready-to-run LAMP (Linux, Apache, MySQL, PHP) development stack containerized with Docker.

## Components

1. **Apache 2.4 & PHP 8.3** (built via [Dockerfile](Dockerfile) with `mysqli`, `pdo_mysql`, `zip`, and utility packages)
2. **MySQL 8.0**
3. **phpMyAdmin**

---

## Prerequisites

1. Ensure Docker Engine and Docker Compose are installed:
   ```bash
   docker --version
   docker compose version
   ```
   If not installed, refer to the official [Docker installation guide](https://docs.docker.com/engine/install/).

2. (Optional) Install the [Docker extension for Visual Studio Code](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker).

---

## Getting Started

1. **Navigate to the setup directory:**
   ```bash
   cd docker-lamp
   ```

2. **Build the PHP / Apache image:**
   ```bash
   docker compose build
   ```

3. **Start the containers:**
   ```bash
   docker compose up -d
   ```

4. **View logs (optional):**
   ```bash
   docker compose logs -f
   ```

---

## Service Access & Credentials

| Service | URL / Port | Credentials / Details |
| :--- | :--- | :--- |
| **PHP Application** | [http://localhost:9001/](http://localhost:9001/) | Served from `./www` directory (`index.php`) |
| **phpMyAdmin** | [http://localhost:9002/](http://localhost:9002/) | **User:** `user` (or `root`)<br>**Password:** `user` (or `root`) |
| **MySQL Server** | Host port `4307` (mapped to `3306`) | **Database:** `myDb`<br>**User:** `user` / `user`<br>**Root:** `root` / `root` |

> [!NOTE]
> Database initialization SQL scripts can be placed inside the [`dump/`](dump/) folder. They are automatically executed on first container start.

---

## Useful Commands

- **Access MySQL CLI inside container:**
  ```bash
  docker compose exec db mysql -u root -p
  ```
  *(Enter root password `root` when prompted)*

- **Access web server shell:**
  ```bash
  docker compose exec www bash
  ```

- **Stop containers:**
  ```bash
  docker compose down
  ```

- **Stop containers and remove volumes (resets database):**
  ```bash
  docker compose down -v
  ```

---

## Screenshot

![Example](Documents/Images/screenshot.png)
