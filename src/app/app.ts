import { Component, OnInit } from '@angular/core';
import { AuthService } from './auth/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-root',
  standalone: false,
  templateUrl: './app.html',
  styleUrls: ['./app.css']
})
export class AppComponent implements OnInit {
  menuItems: { label: string, route: string }[] = [];

  constructor(public auth: AuthService, private router: Router) {}

  ngOnInit() {
    const token = this.auth.getToken();
    if (token) {
      const payload = JSON.parse(atob(token.split('.')[1]));
      const roles: string[] = payload.roles;

      if (roles.includes('ADMINISTRADOR')) {
        this.menuItems = [
          { label: 'Dashboard', route: '/admin/dashboard' },
          { label: 'Polizas', route: '/admin/polizas' }
        ];
      } else if (roles.includes('EMISOR')) {
        this.menuItems = [
          { label: 'Listar Polizas', route: '/emisor/listar-polizas' },
          { label: 'Emitir Poliza', route: '/emisor/emitir' },
          { label: 'Polizas', route: '/emisor/polizas' }
        ];
      } else if (roles.includes('AJUSTADOR')) {
        this.menuItems = [
          { label: 'Polizas', route: '/ajustador/polizas' }
        ];
      } else if (roles.includes('VENDEDOR')) {
        this.menuItems = [
          { label: 'Crear Cliente', route: '/vendedor/crear-cliente' },
          { label: 'Polizas', route: '/vendedor/polizas' }
        ];
      } else if (roles.includes('PERITO')) {
        this.menuItems = [
          { label: 'Seguimiento Reclamo', route: '/perito/seguimiento-reclamo' }
        ];
      }
    }
  }

  logout() {
    this.auth.logout();
    this.router.navigate(['/login']);
  }
}
