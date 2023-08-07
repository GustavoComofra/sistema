import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, map } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class GarantiaServiceService {
//  baseUrl:string = "http://localhost/sistema/garantia/src/app/Conexion/";
baseUrl:string = "http://interno.comofrasrl.com.ar/sistema/garantia/Conexion/";

constructor(private httpClient : HttpClient) { }
public gargistration(Serie,Correo,Telefono) {
  return this.httpClient.post<any>(this.baseUrl + 'register.php', { Serie,Correo,Telefono })
  .pipe(map(Garant => {
  return Garant;
  }));
  }

  // public saveGarantia(garante: any): Observable<any>{
  //   return this.httpClient.post(this.baseUrl,garante);

  //  }
   saveGarantia(Nombre: any){
    return this.httpClient.post(`${this.baseUrl}agregarGarantia.php`, JSON.stringify(Nombre));

  }



}
