# CRUD Basic — Laravel 13 Application

A modern and robust basic CRUD application built on top of the **Laravel 13** framework, utilizing **Vite**, **SQLite**, and **concurrent background worker orchestration** for standard, streamlined development.

---

## 🚀 Getting Started

The project has been configured with powerful Composer commands that bundle multiple operations into single commands to dramatically simplify installation and execution.

### Prerequisites
Make sure your development machine has the following tools installed:
- **PHP 8.3+**
- **Composer**
- **Node.js 20+ & NPM**
- **SQLite** (or another supported database engine)

---

## 🛠️ Local Installation & Setup

Set up the entire project database, environment configuration, PHP dependencies, and frontend assets with a single command:

```bash
composer run setup
```

This automated script will:
1. Run `composer install` to fetch server-side dependencies.
2. Verify or create your local configuration by copying `.env.example` to `.env`.
3. Generate a secure, unique `APP_KEY` for password hashing and session encryption.
4. Execute database migrations (`php artisan migrate --force`).
5. Install NPM packages and compile production frontend assets with Vite (`npm run build`).

---

## 🏃 Run & Usage

Start the complete development stack (Web Server, Queue Worker, and Vite Live Reload Server) concurrently in a single terminal window:

```bash
composer run dev
```

The server will be reachable at:
- 🌐 **Web Server**: [http://localhost:8000](http://localhost:8000)
- ⚡ **Vite Dev Server (HMR)**: [http://localhost:5173](http://localhost:5173)

---

## 🐳 Docker Containerization

To run the entire application inside a containerized sandbox without installing PHP, Node.js, or SQLite locally:

### 1. Build and Start the Environment
```bash
docker compose up --build
```

This command builds the development environment and spins up the container.

### 2. Run Setup inside the Container (First Time)
To run migrations and prepare the key in the container environment:
```bash
docker compose exec app composer run setup
```

### 3. Ports & Volume Mounting
- **App URL**: [http://localhost:8000](http://localhost:8000)
- **Vite Dev HMR**: [http://localhost:5173](http://localhost:5173)
- Changes in your local directory are hot-mounted directly into the container using volumes.

---

## ⚙️ Environment Variables

The project configuration is managed entirely through the `.env` file. Key environment variables used by the application include:

| Variable | Default Value | Description |
| :--- | :--- | :--- |
| `APP_NAME` | `Laravel` | Name of the application. |
| `APP_ENV` | `local` | Current environment (`local`, `production`, `testing`). |
| `APP_KEY` | *(Generated on setup)* | The 32-character application key used for encryption. |
| `APP_DEBUG` | `true` | Enables or disables debug mode with descriptive error pages. |
| `APP_URL` | `http://localhost` | The base URL of your application. |
| `DB_CONNECTION` | `sqlite` | The database connection driver. |
| `QUEUE_CONNECTION` | `database` | Driver for running background jobs and queues. |
| `SESSION_DRIVER` | `database` | Driver for storing session data. |

---

## 🔒 Security Auditing Notes

> [!NOTE]
> During codebase static analysis, security scanners may report warnings regarding "Possible hardcoded passwords" in the following files:
> - `vendor\laravel\framework\src\Illuminate\Database\Console\DbCommand.php`
> - `vendor\laravel\framework\src\Illuminate\Database\Schema\MySqlSchemaState.php`
>
> **These are safe to ignore.** They are standard utility components inside the third-party Laravel framework core codebase (managed by Composer under the `vendor/` directory) that check for DB credentials dynamically or implement standard parameters, not actual hardcoded credentials. Never manually edit files in the `vendor/` folder as modifications will be overwritten upon package updates.
