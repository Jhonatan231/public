import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SeguimientoReclamoComponent } from './seguimiento-reclamos.component';

describe('SeguimientoReclamosComponent', () => {
  let component: SeguimientoReclamoComponent;
  let fixture: ComponentFixture<SeguimientoReclamoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [SeguimientoReclamoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SeguimientoReclamoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
