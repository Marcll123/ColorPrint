import {
    HttpService
} from './HttpService'
import {
    API,
    GET,
    POST,
    PUT,
    DELETE
} from './ConfigApi';  

export class UsersService {
    constructor() {
        this.url = `${API}/Users.php`;
        this.url2 = `${API}/Profile.php`;
        this.url3 = `${API}/Recover.php`;
        this.url4 = `${API}/Userdata.php`;
        this.url5 = `${API}/SearchUser.php`;
    }

    async getUsers(page) {
        const response = await new HttpService(`${this.url}?page=${page}`, GET).setHeaders({token: localStorage.getItem('token')}).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async sendData(data) {
        const response = await new HttpService(this.url3, POST).setData(data).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getUsersProfile(data) {
        const response = await new HttpService(`${this.url2}?user=${data}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getUserSearch(data) {
        const response = await new HttpService(`${this.url5}?user=${data}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getUsersdataid(id) {
        const response = await new HttpService(`${this.url4}?id=${id}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async saveUsers(body) {
        const response = await new HttpService(this.url, POST).setData(body).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }


    async updateUsers(body, id) {
        const response = await new HttpService(`${this.url}?id=${id}`, PUT).setHeaders({
            'Content-Type': 'application/json'
        }).setData(JSON.stringify(body)).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async updateUsersProfile(body, user) {
        const response = await new HttpService(`${this.url2}?user=${user}`, PUT).setHeaders({
            'Content-Type': 'application/json'
        }).setData(JSON.stringify(body)).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async deleteUsers(id) {
        const response = await new HttpService(`${this.url}?id=${id}`, DELETE).setHeaders({
            'Content-Type': 'application/json'
        }).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}

export class NumberDetail{
    constructor() {
        this.url = `${API}/ConsultNumberUser.php`;
    }

    async getNumberDetail() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}