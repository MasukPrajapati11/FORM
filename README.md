# Simple PHP User Authentication System

This project is a basic user authentication system built with PHP and Tailwind CSS. It includes user registration (signup), login, logout, and a protected dashboard page for authenticated users.

## Features
- User signup with name, email, password, and password confirmation
- User login with email and password
- Session-based authentication
- Flash messages for errors and success
- Protected dashboard page (only accessible when logged in)
- Responsive and clean UI using Tailwind CSS

## File Structure
```
dashboard.php      # Protected dashboard page
login.php          # Login form
login_submit.php   # Login form handler
logout.php         # Logout script
signup.php         # Signup form
signup_submit.php  # Signup form handler
db.php             # Database connection and setup
functions.php      # Helper functions (flash messages, authentication, etc.)
```

## Setup Instructions
1. **Clone or copy the project files to your PHP server directory (e.g., XAMPP's `htdocs`).**
2. **Configure your database in `db.php`.**
   - Create a MySQL database and user table as required by the project.
   - Update the connection details in `db.php`.
3. **Start your local server (e.g., XAMPP, WAMP, MAMP).**
4. **Access the project in your browser:**
   - Signup: `http://localhost/FORM/signup.php`
   - Login: `http://localhost/FORM/login.php`
   - Dashboard: `http://localhost/FORM/dashboard.php` (requires login)

## Dependencies
- PHP 7.x or higher
- MySQL
- Tailwind CSS (via CDN)

## Security Notes
- Passwords should be hashed before storing in the database (check `signup_submit.php`).
- Sessions are used for authentication; ensure session security in production.
- This is a simple demo and not intended for production use without further security hardening.

## License
This project is open source and free to use for learning and personal projects.
