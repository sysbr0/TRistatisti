const url = 'https://api.openweathermap.org/data/2.5/';
const key = '50d563777b4c8a4a3762a7127400f429';

let citynamee = "";

function getcity(ci) {
    citynamee = ci;
    getResult(citynamee);
}

const setQuery = (e) => {
    if (e.keyCode == '13') getcity(searchBar.value);
};

const getResult = (cityName) => {
    let query = `${url}weather?q=${cityName}&appid=${key}&units=metric&lang=tr`;
    fetch(query)
        .then(weather => weather.json())
        .then(displayResult);
};

const displayResult = (result) => {
    let city = document.querySelector('.city');
    city.innerText = `${result.name}, ${result.sys.country}`;

    let temp = document.querySelector('.temp');
    temp.innerText = `${Math.round(result.main.temp)}°C`;

    let desc = document.querySelector('.desc');
    desc.innerText = result.weather[0].description;

    let minmax = document.querySelector('.minmax');
    minmax.innerText = `${Math.round(result.main.temp_min)}°C / ${Math.round(result.main.temp_max)}°C`;
};

const searchBar = document.getElementById('searchBar');
searchBar.addEventListener('keypress', setQuery);