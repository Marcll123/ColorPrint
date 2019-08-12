import {
    HttpService
} from './HttpService'
import {
    API,
    GET,
} from './ConfigApi';


export class ChartPurchaseType {
    constructor() {
        this.url = `${API}/ChartPurchaseType.php`;
    }

    async getData() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}

export class ChartProductName {
    constructor() {
        this.url = `${API}/ChartProductName.php`;
    }

    async getData() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}


export class ChartProductPrice {
    constructor() {
        this.url = `${API}/ChartProductPrice.php`;
    }

    async getData() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}


export class ChartSales {
    constructor() {
        this.url = `${API}/ChartSalesparameter.php`;
        this.url2 = `${API}/ChartSalesparamerter2.php`;
        this.url3 = `${API}/ChartSalesparamerter3.php`;
        this.url4 = `${API}/ChartSalesparamerter4.php`;
    }

    async getData(start, final) {
        const response = await new HttpService(`${this.url}?start=${start}&final=${final}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getData2(start, final) {
        const response = await new HttpService(`${this.url2}?start=${start}&final=${final}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getData3(start, final) {
        const response = await new HttpService(`${this.url3}?start=${start}&final=${final}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getData4(start, final) {
        const response = await new HttpService(`${this.url4}?start=${start}&final=${final}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}

export class CharProductSales {
    constructor() {
        this.url = `${API}/ChartProductSale.php`;
        this.url2 = `${API}/ChartProductNameSale.php`;
    }

    async getData(start, final) {
        const response = await new HttpService(`${this.url}?start=${start}&final=${final}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
    async getData2() {
        const response = await new HttpService(this.url2, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}

export class CharProductPurchase {
    constructor() {
        this.url = `${API}/ChartProductPurchase.php`;
    }

    async getData(start, final) {
        const response = await new HttpService(`${this.url}?start=${start}&final=${final}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}

export class ChartClient {
    constructor() {
        this.url = `${API}/ChartClientName.php`;
        this.url2 = `${API}/ChartClientProduct.php`;
    }

    async getData() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getData2(start, final) {
        const response = await new HttpService(`${this.url2}?start=${start}&final=${final}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}

export class ChartTotal {
    constructor() {
        this.url = `${API}/ChartTotal.php`;
    }


    async getData(start, final) {
        const response = await new HttpService(`${this.url}?start=${start}&final=${final}`, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}


export class ChartUser {
    constructor() {
        this.url = `${API}/ChartTypeUserName.php`;
        this.url2 = `${API}/ChartNumUsers.php`;
    }

    async getData() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getData2() {
        const response = await new HttpService(this.url2, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}

export class ChartProviderUser{
    constructor() {
        this.url = `${API}/ChartProviderName.php`;
        this.url2 = `${API}/ChartProviderNum.php`;
    }

    async getData() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getData2() {
        const response = await new HttpService(this.url2, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}

export class ChartClients{
    constructor() {
        this.url = `${API}/ChartClientTypeName.php`;
        this.url2 = `${API}/ChartNumClient.php`;
    }

    async getData() {
        const response = await new HttpService(this.url, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }

    async getData2() {
        const response = await new HttpService(this.url2, GET).execute();
        if (response.hasOwnProperty('res')) {
            return response.res;
        } else {
            return response;
        }
    }
}





