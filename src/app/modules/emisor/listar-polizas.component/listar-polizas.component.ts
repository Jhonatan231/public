import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MatDialog } from '@angular/material/dialog';
import { PolizaDetalleDialogComponent } from './poliza-detalle-dialog.component';

@Component({
  selector: 'app-listar-polizas',
  standalone: false,
  templateUrl: './listar-polizas.component.html',
  styleUrls: ['./listar-polizas.component.css']
})
export class ListarPolizasComponent implements OnInit {
  polizas: any[] = [];
  loading: boolean = true;

  constructor(private http: HttpClient, private dialog: MatDialog) {}

  ngOnInit(): void {
    this.http.get<any[]>('http://localhost:8080/api/polizas').subscribe({
      next: data => {
        this.polizas = data;
        this.loading = false;
      },
      error: err => {
        console.error(err);
        this.loading = false;
      }
    });
  }

  verDetalle(poliza: any) {
    this.dialog.open(PolizaDetalleDialogComponent, {
      width: '600px',
      data: poliza
    });
  }
}
