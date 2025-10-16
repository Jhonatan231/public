import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListarPolizasComponent } from './listar-polizas.component';

describe('ListarPolizasComponent', () => {
  let component: ListarPolizasComponent;
  let fixture: ComponentFixture<ListarPolizasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ListarPolizasComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListarPolizasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
