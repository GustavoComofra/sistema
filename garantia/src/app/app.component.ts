import { Component } from '@angular/core';
import { HomeComponent } from './home/home.component';
import { Router } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';
import { from } from 'rxjs';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'garantia';
}
