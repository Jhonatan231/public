import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-seguimiento-reclamo',
  standalone: false,
  templateUrl: './seguimiento-reclamos.component.html',
  styleUrls: ['./seguimiento-reclamos.component.css']
})
export class SeguimientoReclamoComponent implements OnInit {
  reclamos: any[] = [];
  displayedColumns: string[] = ['numeroPoliza','cobertura','estado','acciones'];

  constructor(private http: HttpClient) {}

  ngOnInit(): void {
    this.http.get<any[]>('http://localhost:8080/api/reclamos/pendientes')
      .subscribe(res => this.reclamos = res);
  }

  aprobar(id: number) {
    this.http.post(`http://localhost:8080/api/reclamos/${id}/aprobar`, {})
      .subscribe(() => {
        alert('Reclamo aprobado');
        this.reclamos = this.reclamos.filter(r => r.id !== id);
      });
  }

  rechazar(id: number) {
    const motivo = prompt('Ingrese motivo de rechazo:');
    if(!motivo) return;
    this.http.post(`http://localhost:8080/api/reclamos/${id}/rechazar`, { motivo })
      .subscribe(() => {
        alert('Reclamo rechazado');
        this.reclamos = this.reclamos.filter(r => r.id !== id);
      });
  }
}
