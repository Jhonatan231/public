import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../../auth/auth.service';

@Component({
  selector: 'app-navbar',
  standalone: false,
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent {
  roles: string[] = [];

menuItems = [
  { label: 'Listar Polizas', route: '/emisor/listar-polizas', icon: 'visibility', roles: ['EMISOR'] },
  { label: 'Emitir Poliza', route: '/emisor/emitir', icon: 'add_circle', roles: ['EMISOR'] },
  { label: 'Dashboard', route: '/admin/dashboard', icon: 'dashboard', roles: ['ADMINISTRADOR'] },
  { label: 'Gestion de usuarios', route: '/admin/gestion-usuarios', icon: 'people', roles: ['ADMINISTRADOR'] },
  { label: 'Crear Cliente', route: '/vendedor/crear-cliente', icon: 'people', roles: ['VENDEDOR'] },
  { label: 'Ingresar Reclamo', route: '/ajustador/ingresar-reclamo', icon: 'assignment', roles: ['AJUSTADOR'] },
  { label: 'Seguimiento Reclamo', route: '/perito/seguimiento-reclamo', icon: 'visibility', roles: ['PERITO'] }
];


  constructor(private authService: AuthService, private router: Router) {
    this.roles = authService.getRoles();
  }

  logout() {
    this.authService.logout();
    this.router.navigate(['/login']);
  }

  esAdmin() { return this.roles.includes('ADMINISTRADOR'); }
  esEmisor() { return this.roles.includes('EMISOR'); }
  esVendedor() { return this.roles.includes('VENDEDOR'); }
  esAjustador() { return this.roles.includes('AJUSTADOR'); }
  esPerito() { return this.roles.includes('PERITO'); }

  mostrarItem(itemRoles: string[]) {
    return itemRoles.some(r => this.roles.includes(r));
  }
}
