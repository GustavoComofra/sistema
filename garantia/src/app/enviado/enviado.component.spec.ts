import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EnviadoComponent } from './enviado.component';

describe('EnviadoComponent', () => {
  let component: EnviadoComponent;
  let fixture: ComponentFixture<EnviadoComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [EnviadoComponent]
    });
    fixture = TestBed.createComponent(EnviadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
