![Logo Table Link](https://github.com/andrisunardi/tablelink/blob/main/logo.svg?raw=true)

<b>PT. TABLELINK DIGITAL INOVASI</b><br />
Ruko Arcade, MG Office Tower 6th floor.<br />
Jl. Pantai Indah Utara 2 Blok 3 MA & 3 MB,<br />
Kapuk Muara, Kec. Penjaringan, Jakarta Utara, Jakarta 14460<br />
www.table.link

<hr />

Below is a <b>technical documentation</b> / <b>project specification</b> written in <b>English</b>, based strictly on your requirements. This can be used as a <b>README.md</b> or <b>Technical Test Documentation</b>.

<hr />

# Tablelink Technical Test Documentation

## 1. Overview

This project is a <b>Laravel 12</b> web application that implements <b>user authentication</b>, <b>authorization, and management</b>, following <b>REST API standards, MVC architecture</b>, and <b>Dockerized deployment</b>.

The application supports two roles:

<ul>
    <li><b>Admin</b></li>
    <li><b>User</b></li>
</ul>

Admins have access to dashboards and user management features, while normal users can only access a basic dashboard.

## 2. Technology Stack

<ul>
    <li><b>Backend Framework</b>: Laravel 12</li>
    <li><b>Database</b>: MySQL (via Docker)</li>
    <li><b>Authentication</b>: Laravel Authentication (session-based or token-based)</li>
    <li><b>Authorization</b>: Role-based access control (Admin, User)</li>
    <li><b>Charts</b>: Chart.js (based on provided Gist references)</li>
    <li><b>Containerization</b>: Docker & Docker Compose</li>
    <li><b>Testing</b>: PHPUnit (Unit Tests)</li>
    <li><b>Architecture</b>: MVC (Model-View-Controller)</li>
    <li><b>API Standard</b>: RESTful API</li>
</ul>

## 3. User Data Model

### User Table Fields

| Field Name | Type      | Description           |
| ---------- | --------- | --------------------- |
| name       | string    | User full name        |
| email      | string    | Unique user email     |
| password   | string    | Hashed password       |
| created_at | timestamp | Record creation time  |
| updated_at | timestamp | Record update time    |
| last_login | timestamp | Last successful login |
| deleted_at | timestamp | Soft delete timestamp |

#### Notes

<ul>
    <li>email must be <b>unique</b></li>
    <li>deleted_at is used for <b>soft deletes</b></li>
    <li>Passwords are stored using Laravel hashing 4. Authentication & Authorization</li>
</ul>

### 4.1 Registration

<ul>
    <li>Users can register using <b>email and password</b></li>
    <li>Email must be <b>unique</b></li>
    <li>Default role assigned: <b>User</b></li>
</ul>

### 4.2 Authentication

<ul>
    <li>Both <b>Admin</b> and <b>User</b> can log in</li>
    <li>
        On successful login:
        <ul>
            <li>last_login is updated</li>
        </ul>
    </li>
</ul>

### 4.3 Authorization

<ul>
    <li>
        <b>User</b>
        <ul>
            <li>Redirected to an empty dashboard</li>
        </ul>
    </li>
    <li>
        <b>Admin</b>
        <ul>
            <li>
                Access to:
                <ul>
                    <li>Dashboard with charts</li>
                    <li>User management features</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

Authorization is enforced using:

<ul>
    <li>Middleware</li>
    <li>Policies or Gates 5. User Management (Admin Only)</li>
</ul>

### 5.1 Read Users

<ul>
    <li>Endpoint returns paginated user data</li>
    <li>Pagination: <b>10 users per page</b></li>
    <li>Soft-deleted users are excluded by default</li>
</ul>

### 5.2 Update User

<ul>
    <li>Admin can update user data</li>
    <li>
        Email validation:
        <ul>
            <li>Must be unique</li>
            <li>Current user’s email is excluded from uniqueness check</li>
        </ul>
    </li>
</ul>

### 5.3 Delete User

<ul>
    <li>Admin-only access</li>
    <li>Uses <b>soft delete</b></li>
    <li>Sets deleted_at timestamp instead of permanently removing data</li>
</ul>

6. Dashboard (Admin)

The Admin Dashboard displays the following charts:

### 6.1 Line Chart

<ul>
    <li>
        Source reference:<br />
        https://gist.github.com/rachmanlatif/323bd55b284774bf98e11225ce2374e1
    </li>
</ul>

### 6.2 Vertical Bar Chart

<ul>
    <li>
        Source reference:<br />
        https://gist.github.com/rachmanlatif/51277a2070e6cd240bf471d9aead29d7
    </li>
</ul>

### 6.3 Pie Chart

<ul>
    <li>
        Source reference:<br />
        https://gist.github.com/rachmanlatif/ad0290b004c1bfa9ded5f872f680fea8
    </li>
</ul>

#### Notes

<ul>
    <li>Charts are modularized into reusable view components</li>
    <li>Data is provided via REST API endpoints</li>
</ul>

### 7. Flight Infomation (Admin)

The Flight Information page collects flight ticket information from <b>Tiket.com</b> based on specific search criteria:

#### Notes

<ul>
    <li>Target: https://www.tiket.com</li>
    <li>
        Search Criteria:
        <ul>
            <li>Search for <b>one-way flight tickets</b>.</li>
            <li>Depature city: Jakarta (CGK)</li>
            <li>Destination city: Bali (DPS)</li>
            <li>Departure time: Before 5:00 PM (17:00 local time)</li>
            <li>Flight type: Economy class</li>
            <li>Trip type: One-way</li>
        </ul>
    </li>
    <li>
        Data to Collect:
        <ul>
            <li>Airline name</li>
            <li>Flight number</li>
            <li>Departure time</li>
            <li>Price</li>
            <li>Departure airport</li>
            <li>Arrival airport</li>
        </ul>
    </li>
    <li>
        Output Requirement:
        <ul>
            <li>Data is provided via REST API endpoints.</li>
            <li>At Flight Information page, make as data-table.</li>
        </ul>
    </li>
</ul>

### 8. Project Structure (MVC Best Practices)

#### Best Practices Applied

<ul>
    <li>Request validation separated using <b>Form Request</b></li>
    <li>Business logic kept inside services or controllers</li>
    <li>Views split into reusable components</li>
    <li>Clean separation between API and UI logic</li>
</ul>

### 9. Dockerization

#### Dockerized Components

<ul>
    <li>Laravel Application</li>
    <li>Database (MySQL / PostgreSQL)</li>
    <li>Web Server (Nginx)</li>
</ul>

#### Docker Compose

<ul>
    <li>Single docker-compose.yml file</li>
    <li>Environment variables managed via .env</li>
    <li>
        One command setup:<br />
        docker-compose up -d
    </li>
</ul>

### 10. Testing

#### Unit Tests

<ul>
    <li>
        Each major function has corresponding unit tests:
        <ul>
            <li>Authentication</li>
            <li>Authorization</li>
            <li>User CRUD</li>
            <li>Dashboard data generation</li>
        </ul>
    </li>
</ul>

#### Testing Tools

<ul>
    <li>PHPUnit</li>
    <li>Laravel testing utilities</li>
</ul>

#### Run Tests

```
php artisan test
```

### 11. Security Considerations

<ul>
<li>Password hashing using Laravel Hash</li>
<li>Role-based middleware</li>
<li>Soft delete to prevent accidental data loss</li>
<li>Validation on all incoming requests</li>
</ul>
