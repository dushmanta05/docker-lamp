# PostgreSQL with Adminer

A Docker Compose setup for running **PostgreSQL 17** paired with **Adminer** as a web-based database management interface, customized with an external clean theme ([adminer.css](adminer.css)).

---

## Services & Ports

| Service | Container Name | Host Port | Internal Port | Description |
| :--- | :--- | :--- | :--- | :--- |
| **PostgreSQL** | `postgres_container` | `5432` | `5432` | PostgreSQL 17 database engine |
| **Adminer** | `adminer_container` | `8080` | `8080` | Web database management UI with custom theme |

---

## Prerequisites

- [Docker](https://docs.docker.com/engine/install/) and [Docker Compose](https://docs.docker.com/compose/install/) installed.

---

## Configuration

1. Navigate to the `postgresql` directory:
   ```bash
   cd postgresql
   ```

2. Create your local environment file by copying `.env.example`:
   ```bash
   cp .env.example .env
   ```

3. Configure variables in `.env`:
   ```ini
   POSTGRES_USER=postgres
   POSTGRES_PASSWORD=password
   POSTGRES_DB=local
   ```

---

## Usage

### Start Containers

Run in detached mode:
```bash
docker compose up -d
```

To view live container logs:
```bash
docker compose logs -f
```

### Access Adminer Web UI

Open your browser and navigate to:
**[http://localhost:8080](http://localhost:8080)**

Enter the following connection parameters:
- **System:** `PostgreSQL`
- **Server:** `postgres` *(Docker service name for internal container network)*
- **Username:** value of `POSTGRES_USER`
- **Password:** value of `POSTGRES_PASSWORD`
- **Database:** value of `POSTGRES_DB`

> [!NOTE]
> The custom styling in [`adminer.css`](adminer.css) is mounted directly into the Adminer container to provide a cleaner interface.

### Connecting from External GUI Tools (DBeaver, TablePlus, DataGrip, pgAdmin)

- **Host:** `localhost` (or `127.0.0.1`)
- **Port:** `5432`
- **User:** your `POSTGRES_USER`
- **Password:** your configured `POSTGRES_PASSWORD`
- **Database:** your configured `POSTGRES_DB`

---

## Management Commands

- **Access psql CLI inside container:**
  ```bash
  docker compose exec postgres psql -U postgres -d local
  ```
  *(Replace `postgres` and `local` with your values if modified in `.env`)*

- **Stop containers:**
  ```bash
  docker compose down
  ```

- **Stop containers and remove persistent volume (resets data):**
  ```bash
  docker compose down -v
  ```
