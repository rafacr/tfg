function filtrarTabla() {
  // Obtener el valor del campo de entrada
  var valorInput = document.getElementById("busqueda").value.toUpperCase();

  // Obtener las filas de la tabla
  var filasTabla = document.getElementById("tablaDatos").getElementsByTagName("tr");

  // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
  for (var i = 0; i < filasTabla.length; i++) {
    var mostrarFila = false;
    var celdasFila = filasTabla[i].getElementsByTagName("td");
    for (var j = 0; j < celdasFila.length; j++) {
      var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
      if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
        mostrarFila = true;
        break;
      }
    }
    if (mostrarFila) {
      filasTabla[i].style.display = "";
    } else {
      filasTabla[i].style.display = "none";
    }
  }
}

function filtrarTablaEquipo() {
    // Obtener el valor del campo de entrada
    var valorInput = document.getElementById("busquedaEquipo").value.toUpperCase();
  
    // Obtener las filas de la tabla
    var filasTabla = document.getElementById("tablaEquipo").getElementsByTagName("tr");
  
    // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
    for (var i = 0; i < filasTabla.length; i++) {
      var mostrarFila = false;
      var celdasFila = filasTabla[i].getElementsByTagName("td");
      for (var j = 0; j < celdasFila.length; j++) {
        var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
        if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
          mostrarFila = true;
          break;
        }
      }
      if (mostrarFila) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
}

function filtrarTablaOjeador() {
    // Obtener el valor del campo de entrada
    var valorInput = document.getElementById("busquedaOjeador").value.toUpperCase();
  
    // Obtener las filas de la tabla
    var filasTabla = document.getElementById("tablaOjeador").getElementsByTagName("tr");
  
    // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
    for (var i = 0; i < filasTabla.length; i++) {
      var mostrarFila = false;
      var celdasFila = filasTabla[i].getElementsByTagName("td");
      for (var j = 0; j < celdasFila.length; j++) {
        var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
        if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
          mostrarFila = true;
          break;
        }
      }
      if (mostrarFila) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
}

function filtrarTablaAlevin() {
    // Obtener el valor del campo de entrada
    var valorInput = document.getElementById("busquedaAlevin").value.toUpperCase();
  
    // Obtener las filas de la tabla
    var filasTabla = document.getElementById("tablaAlevin").getElementsByTagName("tr");
  
    // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
    for (var i = 0; i < filasTabla.length; i++) {
      var mostrarFila = false;
      var celdasFila = filasTabla[i].getElementsByTagName("td");
      for (var j = 0; j < celdasFila.length; j++) {
        var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
        if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
          mostrarFila = true;
          break;
        }
      }
      if (mostrarFila) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
}
function filtrarTablaBenjamin() {
    // Obtener el valor del campo de entrada
    var valorInput = document.getElementById("busquedaBenjamin").value.toUpperCase();
  
    // Obtener las filas de la tabla
    var filasTabla = document.getElementById("tablaBenjamin").getElementsByTagName("tr");
  
    // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
    for (var i = 0; i < filasTabla.length; i++) {
      var mostrarFila = false;
      var celdasFila = filasTabla[i].getElementsByTagName("td");
      for (var j = 0; j < celdasFila.length; j++) {
        var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
        if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
          mostrarFila = true;
          break;
        }
      }
      if (mostrarFila) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
}

function filtrarTablaAlevin() {
    // Obtener el valor del campo de entrada
    var valorInput = document.getElementById("busquedaAlevin").value.toUpperCase();
  
    // Obtener las filas de la tabla
    var filasTabla = document.getElementById("tablaAlevin").getElementsByTagName("tr");
  
    // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
    for (var i = 0; i < filasTabla.length; i++) {
      var mostrarFila = false;
      var celdasFila = filasTabla[i].getElementsByTagName("td");
      for (var j = 0; j < celdasFila.length; j++) {
        var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
        if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
          mostrarFila = true;
          break;
        }
      }
      if (mostrarFila) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
}

function filtrarTablaInfantil() {
    // Obtener el valor del campo de entrada
    var valorInput = document.getElementById("busquedaInfantil").value.toUpperCase();
  
    // Obtener las filas de la tabla
    var filasTabla = document.getElementById("tablaInfantil").getElementsByTagName("tr");
  
    // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
    for (var i = 0; i < filasTabla.length; i++) {
      var mostrarFila = false;
      var celdasFila = filasTabla[i].getElementsByTagName("td");
      for (var j = 0; j < celdasFila.length; j++) {
        var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
        if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
          mostrarFila = true;
          break;
        }
      }
      if (mostrarFila) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
}

function filtrarTablaCadete() {
    // Obtener el valor del campo de entrada
    var valorInput = document.getElementById("busquedaCadete").value.toUpperCase();
  
    // Obtener las filas de la tabla
    var filasTabla = document.getElementById("tablaCadete").getElementsByTagName("tr");
  
    // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
    for (var i = 0; i < filasTabla.length; i++) {
      var mostrarFila = false;
      var celdasFila = filasTabla[i].getElementsByTagName("td");
      for (var j = 0; j < celdasFila.length; j++) {
        var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
        if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
          mostrarFila = true;
          break;
        }
      }
      if (mostrarFila) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
}

function filtrarTablaJuvenil() {
    // Obtener el valor del campo de entrada
    var valorInput = document.getElementById("busquedaJuvenil").value.toUpperCase();
  
    // Obtener las filas de la tabla
    var filasTabla = document.getElementById("tablaJuvenil").getElementsByTagName("tr");
  
    // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
    for (var i = 0; i < filasTabla.length; i++) {
      var mostrarFila = false;
      var celdasFila = filasTabla[i].getElementsByTagName("td");
      for (var j = 0; j < celdasFila.length; j++) {
        var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
        if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
          mostrarFila = true;
          break;
        }
      }
      if (mostrarFila) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
}

function filtrarTablaProfesional() {
    // Obtener el valor del campo de entrada
    var valorInput = document.getElementById("busquedaProfesional").value.toUpperCase();
  
    // Obtener las filas de la tabla
    var filasTabla = document.getElementById("tablaProfesional").getElementsByTagName("tr");
  
    // Recorrer las filas de la tabla y ocultar aquellas que no coincidan con la búsqueda
    for (var i = 0; i < filasTabla.length; i++) {
      var mostrarFila = false;
      var celdasFila = filasTabla[i].getElementsByTagName("td");
      for (var j = 0; j < celdasFila.length; j++) {
        var textoCelda = celdasFila[j].textContent || celdasFila[j].innerText;
        if (textoCelda.toUpperCase().indexOf(valorInput) > -1) {
          mostrarFila = true;
          break;
        }
      }
      if (mostrarFila) {
        filasTabla[i].style.display = "";
      } else {
        filasTabla[i].style.display = "none";
      }
    }
}