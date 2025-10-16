import { Injectable } from '@angular/core';
import { CanActivate, Router, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {

  constructor(private auth: AuthService, private router: Router) {}

  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean {
    if (!this.auth.isAuthenticated()) {
      this.router.navigate(['/login']);
      return false;
    }

    const expectedRoles = route.data['roles'] as string[];
    const token = this.auth.getToken();
    if (!token) return false;

    const payload = JSON.parse(atob(token.split('.')[1]));
    const userRoles: string[] = payload.roles;

    if (expectedRoles && !expectedRoles.some(r => userRoles.includes(r))) {
      this.router.navigate(['/no-autorizado']);
      return false;
    }

    return true;
  }
}
