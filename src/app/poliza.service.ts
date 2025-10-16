import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { AuthService } from './auth/auth.service';

@Injectable({
  providedIn: 'root'
})
export class PolizaService {
  private readonly apiUrl = 'http://localhost:8080/api/polizas';

  constructor(
    private http: HttpClient,
    private authService: AuthService
  ) {}

  private getHeaders(): HttpHeaders {
    const token = this.authService.getToken();
    return new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}`
    });
  }

  emitirPoliza(payload: any): Observable<any> {
    return this.http.post(`${this.apiUrl}/emitir`, payload, { headers: this.getHeaders() });
  }

  getPolizaById(id: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/${id}`, { headers: this.getHeaders() });
  }

  getPolizasPorCliente(nit?: string, dpi?: string, nombres?: string): Observable<any> {
    let params: any = {};
    if (nit) params.nit = nit;
    if (dpi) params.dpi = dpi;
    if (nombres) params.nombres = nombres;

    return this.http.get(`${this.apiUrl}/cliente`, { headers: this.getHeaders(), params });
  }

  getPaquetes(): Observable<any> {
    return this.http.get(`${this.apiUrl}/paquetes`, { headers: this.getHeaders() });
  }

  getCoberturas(): Observable<any> {
    return this.http.get(`${this.apiUrl}/coberturas`, { headers: this.getHeaders() });
  }

  getBeneficiarios(id: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/${id}/beneficiarios`, { headers: this.getHeaders() });
  }

  getDependientes(id: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/${id}/dependientes`, { headers: this.getHeaders() });
  }

  getFacturaPorPoliza(id: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/${id}/factura`, { headers: this.getHeaders() });
  }

  getDashboard(): Observable<any> {
    return this.http.get(`${this.apiUrl}/dashboard`, { headers: this.getHeaders() });
  }
}
