const apiKey = "9890ac87c6973b9f36a6a161b724b21d"; 
const city = "Lima"; // City to query
const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=en`;

const getWeather = async () => {
  try {
    const response = await fetch(apiUrl);
    if (!response.ok) {
      throw new Error(`Error: ${response.status}`);
    }
    const data = await response.json();
    console.log("Weather data:", data);

    console.log(`Temperature in ${city}: ${data.main.temp}°C`);
    console.log(`Description: ${data.weather[0].description}`);
  } catch (error) {
    console.error("There was a problem with the request:", error.message);
  }
};

// Call the function
getWeather();
