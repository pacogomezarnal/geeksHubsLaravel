import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

export interface Curso{
  id:Number,
  titulo: String,
  descripcion: String,
  numMaxAlumnos:Number,
  numMinAlumnos:Number,
  categoria:String
}

@Injectable({
  providedIn: 'root'
})
export class CursoService {

  private apiCursosUrl = 'http://localhost:8000/api/cursos';

  constructor(private http: HttpClient) { }

  getCursos(): Observable<Curso[]> {
    return this.http.get<Curso[]>(this.apiCursosUrl);
  }
}
