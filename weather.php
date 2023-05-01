<?php
    include 'plugins.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Weather App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container mt-5">
            <div>
                <h2 class="headSec">Weather App</h2>
            </div>
            <div class="search">
                <input type="text" class="locationField" placeholder="Enter City name">
                <button><img src="assets/weatherImg/search.png"></button>
            </div>
            <div class="error">
                <p >Invalid City Name</p>
            </div>
            <div class="weather">
                <img src="assets/weatherImg/clouds.png" class="weather-icon">
                <h3 class="weather-type">Clouds</h3>
                <h2 class="temp">22 &degC</h2>
                <h2 class="city">New York</h2>
                <div class="details">
                    <div class="col">
                        <img src="assets/weatherImg/humidity.png">
                        <div class="weatherDetails">
                            <p class="humidity">50%</p>
                            <p>Humidity</p>
                        </div>
                    </div>
                    <div class="col">
                        <img src="assets/weatherImg/wind.png">
                        <div class="weatherDetails">
                            <p class="wind">10 km/h</p>
                            <p>Wind Speed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        
        
    </body>
</html>



<script>
   
   const apiKey = "your@apikey";
   const apiUrl = "https://api.openweathermap.org/data/2.5/weather?&units=metric&q=";
   
   const searchBox = document.querySelector(".search input");
   const searchBtn = document.querySelector(".search button");
   const weatherIcon =  document.querySelector(".weather-icon");
   const weatherType = document.querySelector(".weather-type");
   
   async function checkWeather(city){
       const response = await fetch(apiUrl + city + `&appid=${apiKey}`);
       
       if(response.status == 404){
           document.querySelector(".error").style.display = "block";
           document.querySelector(".weather").style.display = "none";
       }else{
            var data = await response.json();
       
        //   console.log(data);
           
           document.querySelector(".city").innerHTML = data.name;
           document.querySelector(".temp").innerHTML = Math.round(data.main.temp) + "&degC";
           document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
           document.querySelector(".wind").innerHTML = data.wind.speed + "km/h";
           
           if(data.weather[0].main == 'Clouds'){
               weatherIcon.src = "assets/weatherImg/clouds.png";
               weatherType.innerHTML = "Clouds";
           }else if(data.weather[0].main == 'Clear'){
               weatherIcon.src = "assets/weatherImg/clear.png";
               weatherType.innerHTML = "Clear";
           }else if(data.weather[0].main == 'Rain'){
               weatherIcon.src = "assets/weatherImg/rain.png";
               weatherType.innerHTML = "Rain";
           }else if(data.weather[0].main == 'Drizzle'){
               weatherIcon.src = "assets/weatherImg/drizzle.png";
               weatherType.innerHTML = "Drizzle";
           }else if(data.weather[0].main == 'Mist'){
               weatherIcon.src = "assets/weatherImg/mist.png";
               weatherType.innerHTML = "Mist";
           }else if(data.weather[0].main == 'Snow'){
               weatherIcon.src = "assets/weatherImg/snow.png";
               weatherType.innerHTML = "Snow";
           }else if(data.weather[0].main == 'Thunderstorm'){
               weatherIcon.src = "assets/weatherImg/thunderstorm.png";
               weatherType.innerHTML = "Thunderstorm";
           }
           document.querySelector(".weather").style.display = "block";
           document.querySelector(".error").style.display = "none";
           }
   }
   
   searchBtn.addEventListener("click", ()=>{
       checkWeather(searchBox.value);
   })
   
   
    
</script>





<style>
    @import url('https://fonts.googleapis.com/css2?family=Ysabeau:ital@1&display=swap');
    
    body{
        background: url('assets/animescenery.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        font-family: 'Ysabeau', sans-serif;
    }
    .headSec{
        text-align: center;
        color: #fff;
        text-transform: uppercase;
        text-decoration: underline;
        margin-bottom: 20px;
    }
    .container{
        width: 600px;
        justify-content: center;
        align-items: center;
        margin: auto;
    }
    .search{
        width: 600px;
        justify-content: center;
        align-items: center;
        margin: auto;
    }
    .locationField{
        width: 500px;
        height: 50px;
        background: #ebfffc;
        border-radius: 30px;
        margin-right: 10px;
        padding: 10px;
        font-size: 18px;
        color: #555;
        opacity: 0.9;
    }
    .search button{
        background: #ebfffc;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        cursor: pointer;
        opacity: 0.9;
    }
    .search button img{
        width: 16px;
        opacity: 0.9;
    }
    .weather-icon{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        width: 170px;
    }
    .weather-type, .temp{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin: auto;
        color: #fff;
        font-size: 30px;
    }
    .city{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin: auto;
        color: #fff;
        font-size: 40px;
    }
    .details{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        margin-top: 50px;
        color: #fff;
    }
    .weatherDetails p{
        margin-bottom: 0rem;
    }
    .col{
        display: flex;
        align-items:center;
        text-align: left;
    }
    .col img{
        width: 40px;
        margin-right: 10px;
    }
    .humidity, .wind{
        font-size: 28px;
        margin-top: -6px;
    }
    .weather{
        display: none;
    }
    .error{
        text-align: left;
        margin-left: 10px;
        margin-top: 10px;
        font-size: 20px;
        color: #fff;
        display: none;
    }
    
    /*Media Queries*/
    /*For mobile Devices*/
    @media only screen and (max-width: 600px){
        body{
            background: url('assets/mobileweather.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Ysabeau', sans-serif;
        }
        .container{
        width: 400px;
        justify-content: center;
        align-items: center;
        margin: auto;
    }
    .search{
        width: 400px;
        justify-content: center;
        align-items: center;
        margin: auto;
    }
    .locationField{
        width: 300px;
        height: 50px;
        background: #ebfffc;
        border-radius: 30px;
        margin-right: 10px;
        padding: 10px;
        font-size: 18px;
        color: #555;
        opacity: 0.9;
    }
    }
    
    /*For tablets*/
    @media only screen and (min-width: 600px and max-width: 800px){
        body{
            background: url('assets/tabweather.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Ysabeau', sans-serif;
        }
    }
    
    
</style>

















