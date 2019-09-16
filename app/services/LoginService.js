import {
    HttpService
} from './HttpService';
import {
    API,
    POST
} from './ConfigApi';

export class LoginService {
    constructor() {
        this.url = `${API}/Login.php`;
        this.url2 = `${API}/Login2.php`;
    }
    async sendData(body) {
        const response = await new HttpService(this.url, POST).setData(JSON.stringify(body)).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
    async sendData2(data) {
        const response = await new HttpService(this.url2, POST).setData(data).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}