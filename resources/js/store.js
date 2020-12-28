export default {
    state: {
        auth: {
            isLogin: localStorage.getItem('access_token') !== null,
            access_token: localStorage.getItem('access_token') || null,
        }
    },
    getters: {
        loggedIn(state){
            return state.auth.isLogin;
        },
    },
    mutations: {
        setLogin(state, payload) {
            state.auth = payload;
        },
        setLogout(state){
            state.auth = {
                isLogin: false,
                access_token: null
            }
        }
    },
    actions: {
         retrieveToken(context, payload){
             return new Promise((resolve, reject) => {
                 axios.post('/api/login', payload.user).then(res => {
                     const token = res.data.access_token;
                     context.commit('setLogin', {
                         isLogin: true,
                         access_token: token
                     });
                     localStorage.setItem('access_token', token)
                     resolve(res);
                 }).catch(e => {
                     console.log(e)
                     reject(e);
                 });
             })
        },
        logout(context){
             axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.auth.access_token;
             if(context.getters.loggedIn){
                 return new Promise((resolve, reject) => {
                     axios.post('/api/logout').then(res => {
                         context.commit('setLogout');
                         localStorage.removeItem('access_token')
                         resolve(res);
                     }).catch(e => {
                         context.commit('setLogout');
                         localStorage.removeItem('access_token')
                         reject(e);
                     });
                 })
             }
        }
    }
}
