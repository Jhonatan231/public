import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-ingresar-reclamo',
  standalone: false,
  templateUrl: './ingresar-reclamo.component.html',
  styleUrls: ['./ingresar-reclamo.component.css']
})
export class IngresarReclamoComponent implements OnInit {
  reclamoForm: FormGroup;

  constructor(private fb: FormBuilder, private http: HttpClient) {
    this.reclamoForm = this.fb.group({
      numeroPoliza: ['', Validators.required],
      cobertura: ['', Validators.required],
      fechaSiniestro: ['', Validators.required],
      nombre: ['', Validators.required],
      apellido: ['', Validators.required],
      fechaIngreso: ['', Validators.required]
    });
  }

  ngOnInit(): void {}

  ingresarReclamo() {
    if (this.reclamoForm.invalid) return;
    this.http.post('http://localhost:8080/api/reclamos', this.reclamoForm.value)
      .subscribe(() => alert('Reclamo ingresado con éxito'));
  }
}
