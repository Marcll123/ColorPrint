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
    }
    async sendData(body) {
        const response = await new HttpService(this.url, POST).setData(JSON.stringify(body)).setHeaders({'Content-Type': 'application/json'}).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

}