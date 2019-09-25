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

export class CmbSerivices {
    constructor() {
        this.url = `${API}/CmbProvider.php`;
        this.url2 = `${API}/CmbTypeDocument.php`;
        this.url3 = `${API}/CmbTypePurchase.php`;
        this.url4 = `${API}/CmbPaymentMethod.php`;
        this.url5 = `${API}/CmbOriginPurchase.php`;
        this.url6 = `${API}/LastId.php`;
        this.url7 = `${API}/CmbProduct.php`;
        this.url8 = `${API}/ProductPrice.php`;
        this.url9 = `${API}/CmbMunicipaly.php`;
        this.url10 = `${API}/CmbAccount.php`;
        this.url11 = `${API}/CmbTypeClient.php`;
        this.url12 = `${API}/CmbVoucher.php`;
        this.url13 = `${API}/CmbTypeSales.php`;
    }

    async getCmbProvider() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    
    async getCmbTypeDocument() {
        const response = await new HttpService(this.url2, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getCmbTypePurchase() {
        const response = await new HttpService(this.url3, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getCmbPaymentMethod() {
        const response = await new HttpService(this.url4, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getCmbOriginPurchase() {
        const response = await new HttpService(this.url5, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    
    async getCmbProduct() {
        const response = await new HttpService(this.url7, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getCmbMunicipaly() {
        const response = await new HttpService(this.url9, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getCmbTypeClient() {
        const response = await new HttpService(this.url11, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    
    async getCmbVoucher() {
        const response = await new HttpService(this.url12, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
    
    async getCmbTypeSales() {
        const response = await new HttpService(this.url13, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getCmbAccount() {
        const response = await new HttpService(this.url10, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getlastid() {
        const response = await new HttpService(this.url6, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getproductPrice(id) {
        const response = await new HttpService(`${this.url8}?id=${id}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}