import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from "./home/home.component";
import { PublicComponent } from "./public.component";
import { LoginComponent } from "./login/login.component";
import { RouterModule } from "@angular/router";

@NgModule({
  declarations: [
	PublicComponent
],
  imports: [
    CommonModule,
    RouterModule,
    HomeComponent,
    LoginComponent
  ]
})
export class PublicModule { }
