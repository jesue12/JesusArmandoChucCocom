import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
@Component({
  selector: 'app-flujos',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './flujos.component.html',
  styleUrl: './flujos.component.css'
})
export class FlujosComponent {
  esadmin= true;
  mensaje="";
eseditable= true;

  ciudades= [{id:1,nombre:"tizimin"},{id:2,nombre:"valladolid"},{id:3,nombre:"merida"},{id:4,nombre:"cancun"}]

  guardar(){
    this.mensaje="Datos guardados";
  }

mousedown(){
  this.mensaje="mouse presionado";
}

}
