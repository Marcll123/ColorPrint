import {STATUS_OK, STATUS_NOT_FOUND} from './ConfigApi'
export class HttpService{

    constructor(url, method) {
        this.url = url;
        this.method = method;
        this.data = null;
        this.headers = {}
    }

    setData(data) {
        this.data = data;
        return this;
    }

    setHeaders(headers) {
        this.headers = headers;
        return this;
    }

    async execute(){       
        const response= await  fetch(this.url,{
            method: this.method,
            headers: this.headers,
            body: this.data
        })
        switch (response.status) {
            case STATUS_OK:{
                const data = await response.json();
                return {res: data};
            }
            case STATUS_NOT_FOUND:{
                return {error: 'Pagina no encontrada (404)'}
            }
        }
    }



}