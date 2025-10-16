import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './auth/login/login.component';
import { DashboardComponent } from './modules/admin/dashboard.component/dashboard.component';
import { GestionUsuariosComponent } from './modules/admin/gestion-usuarios.component/gestion-usuarios.component';
import { ListarPolizasComponent } from './modules/emisor/listar-polizas.component/listar-polizas.component';
import { EmitirPolizaComponent } from './modules/emisor/emitir-poliza.component/emitir-poliza.component';
import { CrearClienteComponent } from './modules/vendedor/crear-cliente.component/crear-cliente.component';
import { IngresarReclamoComponent } from './modules/ajustador/ingresar-reclamo.component/ingresar-reclamo.component';
import { NoAutorizadoComponent } from './shared/no-autorizado.component/no-autorizado.component';
import { AuthGuard } from './auth/auth.guard';
import { SeguimientoReclamoComponent } from './modules/perito/seguimiento-reclamos.component/seguimiento-reclamos.component';

const routes: Routes = [
  { path: 'login', component: LoginComponent },
  { path: 'no-autorizado', component: NoAutorizadoComponent },
  { 
    path: '', 
    canActivate: [AuthGuard], 
    children: [
      { path: 'admin/dashboard', component: DashboardComponent, data: { roles: ['ADMINISTRADOR'] } },
      { path: 'admin/gestion-usuarios', component: GestionUsuariosComponent, data: { roles: ['ADMINISTRADOR'] } },
      { path: 'emisor/listar-polizas', component: ListarPolizasComponent, data: { roles: ['EMISOR'] } },
      { path: 'emisor/emitir', component: EmitirPolizaComponent, data: { roles: ['EMISOR'] } },
      { path: 'vendedor/crear-cliente', component: CrearClienteComponent, data: { roles: ['VENDEDOR'] } },
      { path: 'ajustador/ingresar-reclamo', component: IngresarReclamoComponent, data: { roles: ['AJUSTADOR'] }},
      { path: 'perito/seguimiento-reclamo', component: SeguimientoReclamoComponent, data: { roles: ['PERITO'] } }
    ]
  },
  { path: '**', redirectTo: 'login' }
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
