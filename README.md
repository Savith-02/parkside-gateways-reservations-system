# Parkside Gateways Reservations System

Reservation System for Circuit Bungalows and Campsites near National Parks. This reservation system is designed to streamline the booking process for Circuit Bungalows and Campsites located near National Parks.

## Features

#### User Authentication
- Users can sign up for an account or log in using their credentials.
- Only logged-in users are given access to all features.

#### Reservation Management
- Users can view available Circuit Bungalows and Campsites of a selected Park.
- They can make reservations for specific dates and locations.
- The system provides confirmation and booking details upon successful reservation.

### Dashboard
- Users have access to a dashboard displaying their reservation history.
- The functionality to browse booking options, change settings and view notifications has not been implemented.

## Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL

No framework was used in building this project.

## Setup Instructions

1. **Database Configuration:**
   - Open the `Model/Dbh.php` file in your code editor.
   - Replace the database URL, username, password, and database name with your own database credentials.
   - Ensure that your database server is running.

2. **Database Setup:**
   - Create the necessary tables in your database.
     
3. **Deploy the Application:**
   - Upload the project files to your web server or hosting provider using FTP or any other method of your choice.
   - Ensure that the files are placed in the appropriate directory accessible by your web server.

4. **Access the Site:**
   - Once the files are deployed, open a web browser and navigate to the URL where you deployed the application.
   - If everything is set up correctly, you should see the homepage of the site.
   - 
## File Structure

- `app.js`: Main entry point of the application.
- `routes/`: Contains route handlers for different endpoints (e.g., authentication, reservations).
- `models/`: Defines data models for users, reservations, and other entities.
- `controllers/`: Contains logic for handling various requests.
- `views/`: Frontend views for user interface components.
- `public/`: Static assets such as images, stylesheets, and client-side JavaScript files.
- `config/`: Configuration files for database connection, authentication strategies, etc.

## Acknowledgments

This project draws its foundation from the SE Assignment for second semester, first year. The frontend designs are inspired by our collaborative efforts during that assignment. 
Special thanks to the entire team for their contributions and support throughout the development process.

