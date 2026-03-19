<?php

// Import the WeatherService class from the Jassy\Herd namespace.
use Jassy\Herd\WeatherService;

// Load Composer's autoloader to automatically include the necessary classes. (required for classes in /src and vendor packages like Guzzle).
require_once __DIR__ . '/vendor/autoload.php';

// $argc is the number of command-line arguments passed to the script, including the script name itself.
// If less than 2, it means no city was provided.
if($argc < 2) {
    echo "Correct Usage: php weather.php <city>\n";
    exit(1);
}

// Create instance of WeatherService.
$weatherService = new WeatherService();

// Get city from command line argument.
// $argv is an array of command-line arguments passed to the script. $argv[0] is the script name, so we use $argv[1] to get the city name.
$city = $argv['1'];
echo "Getting weather for $city...\n";

// Call API through WeatherService to get weather data for the specified city. 
// The getWeather method will return an associative array containing weather 
// information such as city name, temperature, description, and humidity.
$weather = $weatherService->getWeather($city);
echo "\n";
echo "City: " . $weather['city'] . "\n";
echo "Temperature: " . $weather['temperature'] . "°C\n";
echo "Description: " . $weather['description'] . "\n";
echo "Humidity: " . $weather['humidity'] . "%\n";

