# Laravel Blog Project

## Description
This is a simple blog page built using Laravel. It includes authentication and authorization features, allowing users to create, edit, and delete their own posts. Users can also edit their profile information and upload profile pictures. The project features a post-sharing system where all users can view each other's posts, while maintaining access control for post management.

## Features
- User authentication and authorization (registration, login, logout)
- Create, edit, and delete personal posts
- View all users' posts
- Edit user profiles (profile picture and info)
- Responsive UI with Tailwind CSS

## Installation
### Prerequisites
Ensure you have the following installed on your system:
- PHP (>=8.0)
- Composer
- Laravel
- Node.js & npm
- MySQL or any preferred database

### Setup Instructions
1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd laravel-blog
   ```

2. **Install Laravel dependencies:**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies:**
   ```bash
   npm install
   ```
   (Vite and Tailwind CSS are already included in `package.json`.)

4. **Set up environment variables:**
   - Copy `.env.example` to `.env`
   ```bash
   cp .env.example .env
   ```
   - Generate an application key:
   ```bash
   php artisan key:generate
   ```
   - Configure database credentials in `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Run database migrations:**
   ```bash
   php artisan migrate
   ```

6. **Run the development server:**
   - Start Laravel:
     ```bash
     php artisan serve
     ```
   - Start Vite for Tailwind CSS:
     ```bash
     npm run dev
     ```

7. **Access the application:**
   Open `http://127.0.0.1:8000` in your browser.

## Usage
- Register a new account or log in with existing credentials.
- Create a post, edit, or delete your own posts.
- View posts shared by other users.
- Update profile information and change profile pictures.

## Contributing
Feel free to fork the project, submit issues, or open a pull request to enhance the project further.

## License
This project is open-source and available under the [MIT License](LICENSE).

