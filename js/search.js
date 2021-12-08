

var precios=["paquete 1 $200 pesos","paquete 2 $250 pesos","paquete 3 $300 pesos","paquete 4 $350 pesos","paquete 5 $350 pesos"]
var fotos=["imagenes/regalos.jpg","imagenes/regalo2.jpg","imagenes/regalo1.jpg","imagenes/granodecafeicono.png"]

function UNOO()
{
    var busca=document.getElementById("obtener").value;
    
       
}

function libro(id1)
{
    this.busca=id1;
   
}

function myImagenes(){
    var busca=document.getElementById("obtener").value;
   
    if(busca=="paquete" || busca=="paquete1" || busca=="PAQUETE" || busca=="PAQUETES" || busca=="Paquete")
    {

        
    document.getElementById("imagenes").src=fotos[0];
    document.getElementById("resultado").innerHTML= " \  <br>precio: "+precios[0];
    


    document.getElementById("imagenes2").src=fotos[1];
   
    document.getElementById("resultado1").innerHTML= " \  <br>precio: "+precios[1];
   
 }

 else if(busca=="regalo" || busca=="REGALO" || busca=="regalos"){
     
    document.getElementById("imagenes").src=fotos[2]; 
    document.getElementById("resultado").innerHTML= " \  <br>precio: "+precios[2];
    
    document.getElementById("imagenes2").src=fotos[3];
    document.getElementById("resultado1").innerHTML= " \  <br>precio: "+precios[3];
 }

   
}

function mostrar()
{
    
    document.getElementById("imagenes").src=fotos[0];
    
    document.getElementById("imagenes2").src=fotos[1];
}

    
