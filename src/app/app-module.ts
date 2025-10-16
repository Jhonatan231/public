import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing-module';
import { AppComponent } from './app';
import { ReactiveFormsModule } from '@angular/forms';
import { provideHttpClient, withInterceptors } from '@angular/common/http';

import { MatToolbarModule } from '@angular/material/toolbar';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatListModule } from '@angular/material/list';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { MatCardModule } from '@angular/material/card';
import { MatSelectModule } from '@angular/material/select';
import { MatStepperModule } from '@angular/material/stepper';
import { MatDatepickerModule } from '@angular/material/datepicker';
import { MatNativeDateModule } from '@angular/material/core';
import { MatTableModule } from '@angular/material/table';
import { MatDialogModule } from '@angular/material/dialog';


import { authInterceptor } from './auth/auth.interceptor';

import { NavbarComponent } from './shared/navbar.component/navbar.component';
import { LoginComponent } from './auth/login/login.component';
import { NoAutorizadoComponent } from './shared/no-autorizado.component/no-autorizado.component';
import { DashboardComponent } from './modules/admin/dashboard.component/dashboard.component';
import { CrearClienteComponent } from './modules/vendedor/crear-cliente.component/crear-cliente.component';
import { IngresarReclamoComponent } from './modules/ajustador/ingresar-reclamo.component/ingresar-reclamo.component';
import { SeguimientoReclamoComponent } from './modules/perito/seguimiento-reclamos.component/seguimiento-reclamos.component';
import { ListarPolizasComponent } from './modules/emisor/listar-polizas.component/listar-polizas.component';
import { EmitirPolizaComponent } from './modules/emisor/emitir-poliza.component/emitir-poliza.component';
import { PolizaDetalleDialogComponent } from './modules/emisor/listar-polizas.component/poliza-detalle-dialog.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    LoginComponent,
    NoAutorizadoComponent,
    DashboardComponent,
    CrearClienteComponent,
    IngresarReclamoComponent,
    SeguimientoReclamoComponent,
    ListarPolizasComponent,
    EmitirPolizaComponent,
    PolizaDetalleDialogComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    MatToolbarModule,
    MatButtonModule,
    MatIconModule,
    MatSidenavModule,
    MatListModule,
    MatFormFieldModule,
    MatInputModule,
    MatCardModule,
    MatSelectModule,
    MatStepperModule,
    MatDatepickerModule,
    MatNativeDateModule,
    MatTableModule,
    MatDialogModule
  ],
  providers: [
    provideHttpClient(withInterceptors([authInterceptor]))
  ],
  bootstrap: [AppComponent]
})
export class AppModule {}
