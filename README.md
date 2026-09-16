# Docker Setup

A curated collection of modular Docker Compose setups for local development, testing, and staging environments.

---

## Available Setups

| Directory | Stack / Services | Ports | Management UI | Documentation |
| :--- | :--- | :--- | :--- | :--- |
| [`docker-lamp/`](docker-lamp/) | Apache 2.4 + PHP 8.3 + MySQL 8.0 + phpMyAdmin | `9001` (Web)<br>`9002` (phpMyAdmin)<br>`4307` (MySQL) | phpMyAdmin (`:9002`) | [README](docker-lamp/README.md) |
| [`mysql/`](mysql/) | MySQL + Adminer | `3306` (MySQL)<br>`8080` (Adminer) | Adminer (`:8080`) | [README](mysql/README.md) |
| [`postgresql/`](postgresql/) | PostgreSQL 17 + Adminer | `5432` (PostgreSQL)<br>`8080` (Adminer) | Adminer with custom theme (`:8080`) | [README](postgresql/README.md) |

---

## Directory Structure

```text
docker-setup/
├── docker-lamp/              # LAMP stack setup
│   ├── Documents/            # Screenshots & documentation assets
│   ├── dump/                 # Initial database migration scripts (.sql)
│   ├── www/                  # PHP application source files
│   ├── Dockerfile            # PHP 8.3 Apache custom image build
│   ├── docker-compose.yml    # LAMP compose definition
│   └── README.md             # LAMP stack guide
├── mysql/                    # Standalone MySQL setup
│   ├── .env.example          # Sample environment configuration
│   ├── docker-compose.yml    # MySQL + Adminer compose definition
│   └── README.md             # MySQL setup guide
├── postgresql/               # Standalone PostgreSQL setup
│   ├── adminer.css           # Custom theme for Adminer UI
│   ├── .env.example          # Sample environment configuration
│   ├── docker-compose.yml    # PostgreSQL 17 + Adminer compose definition
│   └── README.md             # PostgreSQL setup guide
├── .gitignore                # Global ignore rules
└── README.md                 # Project root index
```

---

## Quick Start

1. **Navigate to the setup you want to use:**
   ```bash
   cd <directory-name>
   ```
   *(e.g., `cd docker-lamp`, `cd mysql`, or `cd postgresql`)*

2. **Configure environment variables (if applicable):**
   ```bash
   cp .env.example .env
   ```

3. **Start the containers:**
   ```bash
   docker compose up -d
   ```

4. **Stop the containers:**
   ```bash
   docker compose down
   ```

---

## Port Allocation & Notes

> [!TIP]
> Both `mysql` and `postgresql` use port `8080` by default for the Adminer interface. If you intend to run both simultaneously, modify the host port binding in one of the `docker-compose.yml` files (e.g. change `- '8080:8080'` to `- '8081:8080'`).
