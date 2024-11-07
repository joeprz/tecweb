function holaMundo(){
    var div1 = document.getElementById('1');
    div1.innerHTML = '<h3>Hola Mundo</h3>';
}

function e2(){
    var nombre = 'Joe';
    var edad = 20;
    var altura = 1.8;
    var casado = false;
    var div2 = document.getElementById('e2');
    div2.innerHTML = '<p>Nombre: ' + nombre + '</p>' +
                     '<p>Edad: ' + edad + '</p>' +
                     '<p>Altura: ' + altura + ' m</p>' +
                     '<p>Casado: ' + (casado ? 'Sí' : 'No') + '</p>';

}

function e3(){
    var nombre;
    var edad;
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    var div3 = document.getElementById('e3');
    div3.innerHTML = '<p>Hola ' + nombre + ', así que tienes ' + edad + ' años.</p>';

}

function e4(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);
    var div4 = document.getElementById('e4');
    div4.innerHTML = '<p>La suma es: ' + suma + '</p>' +
                     '<p>El producto es: ' + producto + '</p>';

}

function e5(){
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu calificación:', '');
    var div5 = document.getElementById('e5');
    if (nota >= 4) {
        div5.innerHTML = '<p>' + nombre + ' está aprobado con un ' + nota + '</p>';
    }

}

function e6(){
    var num1,num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    var div6 = document.getElementById('e6');
    if (num1>num2) {
        div6.innerHTML = '<p> el número es'+ num1 + '</p>';
    }
        else {
            div6.innerHTML = '<p> el número es'+ num2 + '</p>';
        }
}

function e7(){
    var nota1,nota2,nota3;
    nota1 = prompt('Ingresa 1ra. calificaión:', '');
    nota2 = prompt('Ingresa 2da. calificaión:', '');
    nota3 = prompt('Ingresa 3ra. calificaión:', '');
    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);
    var pro; 
    pro = (nota1+nota2+nota3)/3;
    var div7 = document.getElementById('e7');
    if (pro>=7) {
        div7.innerHTML = '<p> aprobado </p>';
    }
        else {
            if (pro>=4) {
                div7.innerHTML = '<p> regular </p>';
            }
            else {
                div7.innerHTML = '<p> reprobado </p>';
            }
        }

}

function e8(){
    var valor;
    valor = prompt('Ingresar un numero entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
   var div8 = document.getElementById('e8');
   switch (valor) {
    case 1: 
        div8.innerHTML = '<p>uno</p>';
        break;
    case 2: 
        div8.innerHTML = '<p>dos</p>';
        break;
    case 3: 
        div8.innerHTML = '<p>tres</p>';
        break;
    case 4: 
        div8.innerHTML = '<p>cuatro</p>';   
        break;
    case 5: 
        div8.innerHTML = '<p>cinco</p>';
        break;
    default:
        div8.innerHTML = '<p>debe ingresar un valor comprendido entre 1 y 5</p>';
    }
}

function e9(){
    var col;
    col = prompt('Ingresa el color para el fondo de la ventana (rojo, verde, azul)' , '' );
    switch (col.toLowerCase()) {
        case 'rojo':
            document.body.style.backgroundColor = '#ff0000';
            break;
        case 'verde':
            document.body.style.backgroundColor = '#00ff00';
            break;
        case 'azul':
            document.body.style.backgroundColor = '#0000ff';
            break;
        default:
            alert('Color no reconocido. Prueba con "rojo", "verde" o "azul".');
    }

}

function e10(){
    var x;
    var res= ''; 
    x=1;
    var div10 = document.getElementById('e10');
   while (x <= 100) {
        res += x + '<br>';
        x = x + 1;
    }
    var div10 = document.getElementById('e10');
    div10.innerHTML = res;
}

function e11(){
    var x = 1;
    var suma = 0;
    var valor;
    
    while (x <= 5) {
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma + valor;
        x = x + 1;
    }
    var div11 = document.getElementById('e11');
    div11.innerHTML = 'La suma de los valores es ' + suma;
}

function e12(){
    var valor;
    var res = ''; // Variable para almacenar la salida
    do {
        valor = prompt('Ingresa un valor entre 0 y 999: (para salir del ciclo presione 0)', '');
        valor = parseInt(valor);
        
        // Verifica si el valor es un número válido
        if (!isNaN(valor) && valor >= 0 && valor <= 999) {
            res += 'El valor ' + valor + ' tiene ';
            if (valor < 10) {
                res += '1 dígito';
            } else if (valor < 100) {
                res += '2 dígitos';
            } else {
                res += '3 dígitos';
            }
            res += '<br>';
        } else {
            alert('Por favor, ingresa un número válido entre 0 y 999.');
        }
    } while (valor !== 0);
    
    var div12 = document.getElementById('e12');
    div12.innerHTML = res;
    
}

function e13(){
    var f;
    var res = '';
    for(f=1; f<=10; f++)
    {
        res += f + '<br>';
    }
    var div13 = document.getElementById('e13');
    div13.innerHTML = res;
}

function e14(){
    var div14 = document.getElementById('e14');
    div14.innerHTML = 'Cuidado<br>'+'Ingresa tu documento correctamente<br>'+'Cuidado<br>'+
    'Ingresa tu documento correctamente<br>'+ 'Cuidado<br>'+'Ingresa tu documento correctamente<br>';

}

function e15(){
    function mostrarMensaje() {
        return 'Cuidado<br>Ingresa tu documento correctamente<br>';
    }
    var result = mostrarMensaje() + mostrarMensaje() + mostrarMensaje();
    var div15 = document.getElementById('e15');
    div15.innerHTML = result;
}

function e16(){
        function mostrarRango(x1, x2) {
            var result = '';
            var inicio;
            for (inicio = x1; inicio <= x2; inicio++) {
                result += inicio + '<br>';
            }
            return result;
        }
    
        var valor1, valor2;
        valor1 = prompt('Ingresa el valor inferior:', '');
        valor1 = parseInt(valor1);
        valor2 = prompt('Ingresa el valor superior:', '');
        valor2 = parseInt(valor2);
        var div16 = document.getElementById('e16');
        div16.innerHTML = mostrarRango(valor1, valor2);
}

function e17(){
    function convertirCastellano(x) {
        if (x == 1)
            return 'uno';
        else if (x == 2)
            return 'dos';
        else if (x == 3)
            return 'tres';
        else if (x == 4)
            return 'cuatro';
        else if (x == 5)
            return 'cinco';
        else
            return 'valor incorrecto';
    }
    var valor = prompt('Ingresa un valor entre 1 y 5:', '');
    valor = parseInt(valor);
    var resultado = convertirCastellano(valor);
    var div17 = document.getElementById('e17');
    div17.innerHTML = resultado;
}

function e18(){
    function convertirCastellano(x) {
        switch (x) {
            case 1: return 'uno';
            case 2: return 'dos';
            case 3: return 'tres';
            case 4: return 'cuatro';
            case 5: return 'cinco';
            default: return 'valor incorrecto';
        }
    }
    var valor = prompt('Ingresa un valor entre 1 y 5:', '');
    valor = parseInt(valor);
    var resultado = convertirCastellano(valor);
    var div18 = document.getElementById('e18');
    div18.innerHTML = resultado;   
}