import { Component } from '@angular/core';
import {Curso,CursoService} from './curso.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'gestorCursosFront';
  cursos: Curso[];

  constructor(private cursoService: CursoService) {}

  ngOnInit(){
    this.cursoService.getCursos().subscribe(cursos=>this.cursos=cursos);
  }
}
