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

export class SaleService {
    constructor() {
        this.url = `${API}/Sales.php`;
        this.url2 = `${API}/SalesDataOne.php`;
        this.url3 = `${API}/SalesAllDataClient.php`;
        this.url4 = `${API}/SalesAllProduct.php`;
        this.url5 = `${API}/SalesOneProduct.php`;
        this.url6 = `${API}/SaleDetail.php`;
        this.url7 = `${API}/SalesLastId.php`;
        this.url8 = `${API}/SalesSubtotal.php`;
        this.url9 = `${API}/SalesDetailF.php`;
        this.url10 = `${API}/SalesDatatotal.php`;
    }

    async getSales(page) {
        const response = await new HttpService(`${this.url}?page=${page}`, GET).setHeaders({token: localStorage.getItem('token')}).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
    async getAllSales(page) {
        const response = await new HttpService(`${this.url10}?page=${page}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getOneClient(data) {
        const response = await new HttpService(`${this.url2}?id=${data}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
    async getSubtotal(data) {
        const response = await new HttpService(`${this.url8}?id=${data}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
    async getOneProduct(data) {
        const response = await new HttpService(`${this.url5}?id=${data}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getAllClient() {
        const response = await new HttpService(this.url3, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getLastId() {
        const response = await new HttpService(this.url7, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getAllProducts() {
        const response = await new HttpService(this.url4, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async saveSales(body) {
        const response = await new HttpService(this.url, POST).setData(body).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async saveSalesDF(body) {
        const response = await new HttpService(this.url9, POST).setData(body).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async saveSalesDetail(body) {
        const response = await new HttpService(this.url6, POST).setData(body).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }


    async updateSales(body, id) {
        const response = await new HttpService(`${this.url}?id=${id}`, PUT).setHeaders({
            'Content-Type': 'application/json'
        }).setData(JSON.stringify(body)).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async deleteSales(id) {
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

export class NumberS{
    constructor() {
        this.url = `${API}/ConsultNumerSales.php`;
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