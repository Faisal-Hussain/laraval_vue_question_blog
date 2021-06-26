class AppStorage
{
    storeUser(user)
    {
        localStorage.setItem('token',user);

    }
    storeToken(token)
    {
        localStorage.setItem('user',token);
    }
    store(token,user)
    {
        this.storeToken(token)
        this.storeUser(user)
    }
    clear()
    {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }
    getToken()
    {
        return localStorage.getItem('token')
    }
    getUser()
    {
        return localStorage.getItem('user')
    }
}

export default AppStorage=new AppStorage()
