import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { tap } from 'rxjs/operators';
import { BehaviorSubject, Observable } from 'rxjs';
import { CookieService } from 'ngx-cookie-service';
import { JwtHelperService } from '@auth0/angular-jwt';

interface JwtPayload {
  sub: string;
  roles: string[];
  iat: number;
  exp: number;
}

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private readonly apiUrl = 'http://localhost:8080/auth';
  private readonly tokenSubject: BehaviorSubject<string | null>;
  token$: Observable<string | null>;
  private readonly rolesSubject: BehaviorSubject<string[]>;
  roles$: Observable<string[]>;

  private readonly jwtHelper = new JwtHelperService();

  constructor(
    private readonly http: HttpClient,
    private readonly cookieService: CookieService
  ) {
    const token = this.cookieService.get('token') || null;
    this.tokenSubject = new BehaviorSubject<string | null>(token);
    this.token$ = this.tokenSubject.asObservable();

    const roles = this.extractRoles(token);
    this.rolesSubject = new BehaviorSubject<string[]>(roles);
    this.roles$ = this.rolesSubject.asObservable();
  }

  login(username: string, password: string) {
    return this.http.post<{ token: string }>(`${this.apiUrl}/login`, { username, password })
      .pipe(
        tap(response => {
          this.cookieService.set('token', response.token);
          this.tokenSubject.next(response.token);
          this.rolesSubject.next(this.extractRoles(response.token));
        })
      );
  }

  logout() {
    this.cookieService.delete('token');
    this.tokenSubject.next(null);
    this.rolesSubject.next([]);
  }

  getToken(): string | null {
    return this.tokenSubject.value;
  }

  isAuthenticated(): boolean {
    const token = this.getToken();
    return token != null && !this.jwtHelper.isTokenExpired(token);
  }

  getRoles(): string[] {
    return this.rolesSubject.value;
  }

  private extractRoles(token: string | null): string[] {
    if (!token) return [];
    try {
      const decoded = this.jwtHelper.decodeToken(token) as JwtPayload;
      return decoded.roles || [];
    } catch (error) {
      console.error('Error decodificando token:', error);
      return [];
    }
  }
}
