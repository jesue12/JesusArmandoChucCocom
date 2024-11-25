import { Component } from '@angular/core';
import { Demo2Component } from "../demo2/demo2.component";

@Component({
  selector: 'app-demo',
  standalone: true,
  imports: [Demo2Component],
  templateUrl: './demo.component.html',
  styleUrl: './demo.component.css'
})
export class DemoComponent {
usuario="jesus";
edad: number= 30;

}
