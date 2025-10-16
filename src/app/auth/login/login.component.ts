import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../auth.service';
import { ListKeyManager } from '@angular/cdk/a11y';

@Component({
  selector: 'app-login',
  standalone:false,
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  loginForm: FormGroup;
  error = '';

  constructor(private fb: FormBuilder, private auth: AuthService, private router: Router) {
    this.loginForm = this.fb.group({
      username: ['', Validators.required],
      password: ['', Validators.required]
    });
  }

  login() {
    if (this.loginForm.invalid) return;
    const { username, password } = this.loginForm.value;
    this.auth.login(username, password).subscribe({
      next: (res: any) => {
        const payload = JSON.parse(atob(res.token.split('.')[1]));
        const roles: string[] = payload.roles;
        if (roles.includes('ADMINISTRADOR')) this.router.navigate(['/admin/dashboard']);
        else if (roles.includes('VENDEDOR')) this.router.navigate(['/vendedor/crear-cliente']);
        else if (roles.includes('AJUSTADOR')) this.router.navigate(['/ajustador/ingresar-reclamo']);
        else if (roles.includes('PERITO')) this.router.navigate(['/perito/seguimiento-reclamo']);
        else if (roles.includes('EMISOR')) this.router.navigate(['/emisor/listar-polizas']);
        else this.router.navigate(['/unauthorized']);
      },
      error: () => this.error = 'Usuario o contraseña incorrectos'
    });
  }
}
