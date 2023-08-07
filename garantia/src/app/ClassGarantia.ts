export class Garant {
  public Id_gar: number;
  public Serie: string;
  public Correo:string;
  public Telefono:string;



  constructor(Id_gar:number,Serie: string,Correo:string,Telefono:string) {
  this.Id_gar = Id_gar;
  this.Serie = Serie;
  this.Correo = Correo;
  this.Telefono = Telefono;


  }
}
