import Token from './Token'
import AppStorage from "./AppStorage";
class User
{
    login(data)
    {
        axios.post('/api/auth/login',data)
            .then(response=>this.responseAfterLogin(response))
            .catch(error=>console.log(error.response.data))
    }

    responseAfterLogin(response)
    {
        const access_token=response.data.access_token
        const user=response.data.user

        if(Token.isValid(access_token))
        {
            console.log(response.data)
            AppStorage.store(user,access_token)
        }
        window.location='/forum'
    }
    hasToken()
    {
        const storeToken =AppStorage.getToken();
        if(storeToken)
        {
            return Token.isValid(storeToken)
        }
        return false

    }
    loggedIn()
    {
        return this.hasToken()
    }
    logout()
    {
        AppStorage.clear()
        window.location='/forum'
    }
    name()
    {
        if(this.loggedIn())
        {
            return  AppStorage.getUser()
        }
    }
    id()
    {
        if(this.loggedIn())
        {
            const payload=Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }
    admin()
    {
        return this.id()==1
    }
}
 export default User=new User();
