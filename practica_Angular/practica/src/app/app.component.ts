import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { DemoComponent } from './demos/demo/demo.component';
import { FlujosComponent } from "./controles/flujos/flujos.component";
@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, DemoComponent, FlujosComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'practica';
}
