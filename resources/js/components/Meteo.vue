<template>
    <div>
        <h1>Météo actuelle</h1>
        <div v-if="weatherData">
            <p>Ville : {{ weatherData.name }}</p>
            <p>Température : {{ weatherData.main.temp }}°C</p>
            <p>Description : {{ weatherData.weather[0].description }}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            weatherData: null,
        };
    },
    mounted() {
        this.fetchWeatherData();
    },
    methods: {
        async fetchWeatherData() {
            try {
                const response = await fetch(
                    `https://api.openweathermap.org/data/2.5/weather?q={Lausanne}&appid={c01b6a028a44098bd8a230315ce81b19}`
                );
                this.weatherData = await response.json();
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
