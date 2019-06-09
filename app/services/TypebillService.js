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

export class TypeBillService {
    constructor() {
        this.url = `${API}/TypeBill.php`;
    }

    async getTypeBill(page) {
        const response = await new HttpService(`${this.url}?page=${page}`, GET).setHeaders({token: localStorage.getItem('token')}).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async saveTypeBill(body) {
        const response = await new HttpService(this.url, POST).setData(body).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }


    async updateTypeBill(body, id) {
        const response = await new HttpService(`${this.url}?id=${id}`, PUT).setHeaders({
            'Content-Type': 'application/json'
        }).setData(JSON.stringify(body)).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async deleteTypeBill(id) {
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

export class Number{
    constructor() {
        this.url = `${API}/ConsultNumberTypeBill.php`;
    }

    async getNumber(){
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}