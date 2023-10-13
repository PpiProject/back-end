import axios from 'axios'
// import router from "../router";
export default {
    state: {
        isLoggedIn: !!localStorage.getItem('token')
    },
    mutations: {
        login (state) {
            console.log(state.isLoggedIn)
            state.isLoggedIn = true
        },
        logoutUser (state) {
            state.isLoggedIn = false
        },
    }
}
