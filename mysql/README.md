# MySQL with Adminer

A Docker Compose setup for running a **MySQL** database server alongside **Adminer** as a lightweight web-based database management interface.

---

## Services & Ports

| Service | Container Name | Host Port | Internal Port | Description |
| :--- | :--- | :--- | :--- | :--- |
| **MySQL** | `mysql_container` | `3306` | `3306` | MySQL database engine |
| **Adminer** | `adminer_container` | `8080` | `8080` | Web database management UI |

---

## Prerequisites

- [Docker](https://docs.docker.com/engine/install/) and [Docker Compose](https://docs.docker.com/compose/install/) installed.

---

## Configuration

1. Navigate to the `mysql` directory:
   ```bash
   cd mysql
   ```

2. Create your local environment file by copying `.env.example`:
   ```bash
   cp .env.example .env
   ```

3. Configure variables in `.env`:
   ```ini
   MYSQL_USER=mysql
   MYSQL_PASSWORD=password
   MYSQL_DATABASE=local
   MYSQL_ROOT_PASSWORD=rootpassword
   ```

---

## Usage

### Start Containers

Run in the background (detached mode):
```bash
docker compose up -d
```

To monitor real-time container logs:
```bash
docker compose logs -f
```

### Access Adminer Web UI

Open your browser and navigate to:
**[http://localhost:8080](http://localhost:8080)**

Enter the following connection details:
- **System:** `MySQL`
- **Server:** `mysql` *(Docker service name for internal container network)*
- **Username:** value of `MYSQL_USER` (or `root`)
- **Password:** value of `MYSQL_PASSWORD` (or `MYSQL_ROOT_PASSWORD`)
- **Database:** value of `MYSQL_DATABASE`

### Connecting from External GUI Tools (DBeaver, TablePlus, DataGrip)

- **Host:** `localhost` (or `127.0.0.1`)
- **Port:** `3306`
- **User:** your `MYSQL_USER` or `root`
- **Password:** your configured password
- **Database:** your configured `MYSQL_DATABASE`

---

## Management Commands

- **Access MySQL CLI inside container:**
  ```bash
  docker compose exec mysql mysql -u root -p
  ```

- **Stop containers:**
  ```bash
  docker compose down
  ```

- **Stop containers and remove persistent volume (resets data):**
  ```bash
  docker compose down -v
  ```
