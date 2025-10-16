import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EmitirPolizaComponent } from './emitir-poliza.component';

describe('EmitirPolizaComponent', () => {
  let component: EmitirPolizaComponent;
  let fixture: ComponentFixture<EmitirPolizaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [EmitirPolizaComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EmitirPolizaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
