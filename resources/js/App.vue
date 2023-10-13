<template>
    <header>
        <div class="header_content">
            <img class="logo" src="../../public/img/logo.png"/>
            <div class="account_group">
                <p>Иван Иванов</p>
            </div>
        </div>
    </header>
    <div id="sidebar">
        <div class="side-box">
            <h3>Основное меню</h3>
            <ul class="list">
                <li class="first "><router-link to="/home-page">Доманяя страница</router-link></li>
                <li><a href="#">Услуги</a></li>
                <li><a href="#">Портфолио</a></li>
                <li class="#"><a href="#">Контакты</a></li>
                <li><router-link to="/login">Вход</router-link></li>
            </ul>

        </div>
        <div class="content">
            <router-view />
        </div>
    </div>
</template>

<script>
import HomePage from "./components/HomePage.vue";
import Login from "./components/Login.vue";

export default {
    name: "App",
    components: {HomePage, Login}
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
body{
    margin: 0 auto;
}

.container{
    margin: 0 auto;
    width: 1140px;
}

header{
    height: 100px;
    background: linear-gradient(-65deg, #747474, #46933d);
    background-blend-mode: luminosity;
}

.logo{
    margin-left: 100px;
    margin-top: 10px;
    width: 260px;
    height: 80px;
}

.account_group{
    float: right;
    margin: 40px 100px 0 0;
}

.account_group p {
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    line-height: 26px;
    font-weight: 300;
    color: white;
}

#sidebar {
    width: 300px;
    height: 100vh;
    background: linear-gradient(-65deg, #747474, #46933d);
    padding: 20px;
    border: solid 1px #e3e3e3;
    margin: 0 10px 0 0;;
}

#sidebar ul {
    list-style: none;
}

h1,h2,h3,h4 {
    text-transform: uppercase;
    font-family: Montserrat,sans-serif;
    font-size: 16px;
    line-height: 26px;
    font-weight: 300;
    color: white;
    margin-bottom: 1em;
}

#sidebar ul li.first {
    padding-top: 0;
    border-top: 0;
}

#sidebar ul li {
    border-top: solid 1px #e3e3e3;
    padding: 10px 0 10px 0;
}

#sidebar ul li a{
    font-family: Montserrat,sans-serif;
    font-size: 16px;
    line-height: 26px;
    font-weight: 300;
    color: white;
    text-decoration: none;
}

.content{
    position: relative;
    top: -287px;
    left: 320px;
    width: 1400px;
}
.form_text {
    font-family: Montserrat, sans-serif;
    font-size: 20px;
    line-height: 26px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: gray;
}
</style>
