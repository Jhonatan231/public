import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators, FormArray } from '@angular/forms';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-emitir-poliza',
  standalone: false,
  templateUrl: './emitir-poliza.component.html',
  styleUrls: ['./emitir-poliza.component.css']
})
export class EmitirPolizaComponent implements OnInit {
  polizaForm: FormGroup;
  paquetes: any[] = [];

  constructor(private fb: FormBuilder, private http: HttpClient) {
    this.polizaForm = this.fb.group({
      cliente: this.fb.group({
        nombres: ['', Validators.required],
        apellidos: ['', Validators.required],
        nit: ['', Validators.required],
        dpi: ['', Validators.required],
        telefonos: this.fb.array([this.fb.control('', [Validators.required, Validators.pattern(/^\+502 \d{4} \d{4}$/)])]),
        correos: this.fb.array([this.fb.control('', [Validators.required, Validators.pattern(/^[\w-\.]+@[\w-]+\.(com)$/)])]),
        direccionCobro: ['', Validators.required],
        direccionFiscal: ['', Validators.required],
        direccionCorrespondencia: ['', Validators.required],
        genero: ['', Validators.required],
        fechaNacimiento: ['', Validators.required]
      }),
      beneficiarios: this.fb.array([]),
      dependientes: this.fb.array([]),
      paquete: ['', Validators.required],
      formaPago: ['', Validators.required],
      fechaEmision: ['', Validators.required]
    });
  }

  ngOnInit(): void {
    this.http.get<any[]>('http://localhost:8080/api/polizas/paquetes')
      .subscribe(res => this.paquetes = res);
    this.addBeneficiario();
    this.addDependiente();
  }

  get cliente() { return this.polizaForm.get('cliente') as FormGroup; }
  get telefonos() { return this.cliente.get('telefonos') as FormArray; }
  get correos() { return this.cliente.get('correos') as FormArray; }
  get beneficiarios() { return this.polizaForm.get('beneficiarios') as FormArray; }
  get dependientes() { return this.polizaForm.get('dependientes') as FormArray; }

  addTelefono() { this.telefonos.push(this.fb.control('', [Validators.required, Validators.pattern(/^\+502 \d{4} \d{4}$/)])); }
  removeTelefono(i: number) { this.telefonos.removeAt(i); }

  addCorreo() { this.correos.push(this.fb.control('', [Validators.required, Validators.pattern(/^[\w-\.]+@[\w-]+\.(com)$/)])); }
  removeCorreo(i: number) { this.correos.removeAt(i); }

  addBeneficiario() {
    this.beneficiarios.push(this.fb.group({
      nombres: ['', Validators.required],
      apellidos: ['', Validators.required],
      parentesco: ['', Validators.required],
      participacion: [0, Validators.required],
      genero: ['', Validators.required]
    }));
  }
  removeBeneficiario(i: number) { this.beneficiarios.removeAt(i); }

  addDependiente() {
    this.dependientes.push(this.fb.group({
      nombres: ['', Validators.required],
      apellidos: ['', Validators.required],
      fechaNacimiento: ['', Validators.required],
      parentesco: ['', Validators.required]
    }));
  }
  removeDependiente(i: number) { this.dependientes.removeAt(i); }

  emitirPoliza() {
    if (this.polizaForm.invalid) {
      this.polizaForm.markAllAsTouched();
      return;
    }

    const payload = {
      clienteId: null,
      cliente: this.cliente.value,
      paquete: this.polizaForm.value.paquete,
      beneficiarios: this.beneficiarios.value,
      dependientes: this.dependientes.value,
      formaPago: this.polizaForm.value.formaPago,
      fechaEmision: this.polizaForm.value.fechaEmision
    };

   
    this.http.post('http://localhost:8080/api/polizas/emitir', payload)
      .subscribe(() => alert('Póliza emitida con éxito'));
  }
}
