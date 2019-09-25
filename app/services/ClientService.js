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

export class ClientService {
    constructor() {
        this.url = `${API}/Client.php`;
        this.url2 = `${API}/OneClientData.php`;
        this.url3 = `${API}/SearchClient.php`;
    }

    async getClient(page) {
        const response = await new HttpService(`${this.url}?page=${page}`, GET).setHeaders({token: localStorage.getItem('token')}).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getClientSearch(data) {
        const response = await new HttpService(`${this.url3}?cliente=${data}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async saveClient(body) {
        const response = await new HttpService(this.url, POST).setData(body).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getClientdataid(id) {
        const response = await new HttpService(`${this.url2}?id=${id}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }


    async updateClient(body, id) {
        const response = await new HttpService(`${this.url}?id=${id}`, PUT).setHeaders({
            'Content-Type': 'application/json'
        }).setData(JSON.stringify(body)).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async deleteClient(id) {
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

export class NumberAll{
    constructor() {
        this.url = `${API}/ConsultNumberClient.php`;
    }

    async getNumber() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}