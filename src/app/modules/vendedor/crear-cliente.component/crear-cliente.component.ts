import { Component } from '@angular/core';
import { FormBuilder, FormGroup, FormArray, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-crear-cliente',
  standalone: false,
  templateUrl: './crear-cliente.component.html',
  styleUrls: ['./crear-cliente.component.css']
})
export class CrearClienteComponent {
  clienteForm: FormGroup;

  constructor(private fb: FormBuilder, private http: HttpClient) {
    this.clienteForm = this.fb.group({
      nombres: ['', Validators.required],
      apellidos: ['', Validators.required],
      nit: ['', Validators.required],
      dpi: ['', Validators.required],
      telefonos: this.fb.array([this.fb.group({ telefono: '' })]),
      correos: this.fb.array([this.fb.group({ correo: '' })]),
      direccionCobro: [''],
      direccionFiscal: [''],
      direccionCorrespondencia: [''],
      genero: [''],
      fechaNacimiento: ['']
    });
  }

  get telefonos() { return this.clienteForm.get('telefonos') as FormArray; }
  get correos() { return this.clienteForm.get('correos') as FormArray; }

  addTelefono() { this.telefonos.push(this.fb.group({ telefono: '' })); }
  removeTelefono(i: number) { this.telefonos.removeAt(i); }

  addCorreo() { this.correos.push(this.fb.group({ correo: '' })); }
  removeCorreo(i: number) { this.correos.removeAt(i); }

  crearCliente() {
    if (this.clienteForm.invalid) return;
    this.http.post('http://localhost:8080/api/clientes', this.clienteForm.value)
      .subscribe(() => alert('Cliente creado con éxito'));
  }
}
