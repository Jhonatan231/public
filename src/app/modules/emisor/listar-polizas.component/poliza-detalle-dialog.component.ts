import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'app-poliza-detalle-dialog',
  standalone:false,
  template: `
    <h2 mat-dialog-title>Detalle Póliza {{ data.numeroPoliza }}</h2>
    <mat-dialog-content>
      <p><strong>Cliente:</strong> {{ data.cliente.nombres }} {{ data.cliente.apellidos || '' }}</p>
      <p><strong>Paquete:</strong> {{ data.paquete.nombre }}</p>
      <p><strong>Prima Total:</strong> Q{{ data.primaTotalConIva }}</p>
      <p><strong>Fecha Inicio:</strong> {{ data.fechaInicio }}</p>
      <p><strong>Fecha Fin:</strong> {{ data.fechaFin }}</p>
      <h4>Coberturas:</h4>
      <ul>
        <li *ngFor="let c of data.coberturas">{{ c.nombre }} - Contratada: {{ c.sumaContratada }} Disponible: {{ c.sumaDisponible }}</li>
      </ul>
      <h4>Beneficiarios:</h4>
      <ul>
        <li *ngFor="let b of data.beneficiarios">{{ b.nombre || 'Sin nombre' }} - {{ b.parentesco }} - {{ b.participacion }}%</li>
      </ul>
      <h4>Dependientes:</h4>
      <ul>
        <li *ngFor="let d of data.dependientes">{{ d.nombre || 'Sin nombre' }} - {{ d.parentesco }} - {{ d.fechaNacimiento }}</li>
      </ul>
      <h4>Factura:</h4>
      <p>Estado: {{ data.factura?.estado }}</p>
      <p>Monto Total: Q{{ data.factura?.montoTotal }}</p>
    </mat-dialog-content>
    <mat-dialog-actions align="end">
      <button mat-button mat-dialog-close>Cerrar</button>
    </mat-dialog-actions>
  `
})
export class PolizaDetalleDialogComponent {
  constructor(@Inject(MAT_DIALOG_DATA) public data: any) {}
}
