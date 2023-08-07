import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { GarantiaServiceService } from '../Service/GarantiaService.service';
import { first } from 'rxjs';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit{
  garante: any;
  angForm: FormGroup;
  Garant = {
    Serie : null,
    Correo: null,
    Id_gar : null,
    Telefono: null,
}
  constructor(private fb: FormBuilder,private dataService: GarantiaServiceService,private router:Router) {




 /*this.angForm = this.fb.group({
 Serie: ['', [Validators.required,Validators.minLength(6)]],
   Correo: ['', [Validators.required, Validators.email]],
  Telefono: ['', [Validators.required]],

  });*/
}

ngOnInit() {this.angForm = this.fb.group({
  Id_gar: [''],
  Serie: ['',Validators.minLength],
  Correo: ['', Validators.email],
  Telefono: ['',Validators.minLength],
})

}

guardar(){
  this.dataService.saveGarantia(this.Garant).subscribe((datos: any) =>{
    if(datos['resultado'] == 'OK') {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'A la brevedad el equipo de ventas estara respondiendo',
        showConfirmButton: false,
        timer: 1500
      })
      this.router.navigate(['Enviado']);
    }

  });  }




}
