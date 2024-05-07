# parkside-gateways-reservations-system

- Reservation System for Circuit Bungalows and Campsites near National Parks
This reservation system is designed to streamline the booking process for Circuit Bungalows and Campsites located near National Parks. 

## Features:

### User Authentication:
- Users can sign up for an account or log in using their credentials.
-- Only logged in uses are given access to all features.
  
### Reservation Management:
- Users can view available Circuit Bungalows and Campsites of a selected Park.
- They can make reservations for specific dates and locations.
- The system provides confirmation and booking details upon successful reservation.

Dashboard:
Users have access to a dashboard displaying their reservation history.
The dashboard provides an overview of past and upcoming reservations.

## Technologies Used:

Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL

## Setup Instructions:

Clone the repository to your local machine.
Install dependencies using npm install.
Set up MongoDB database and configure connection settings in the .env file.
Run the application using npm start.
Access the application via the provided URL.

## File Structure:

app.js: Main entry point of the application.
routes/: Contains route handlers for different endpoints (e.g., authentication, reservations).
models/: Defines data models for users, reservations, and other entities.
controllers/: Contains logic for handling various requests.
views/: Frontend views for user interface components.
public/: Static assets such as images, stylesheets, and client-side JavaScript files.
config/: Configuration files for database connection, authentication strategies, etc.
Contributing:

Acknowledgments:

[List any acknowledgments or references here]
A full-fledged website for making and managing reservations. Based on a pure PHP backend with no frameworks and minimal dependecies.
