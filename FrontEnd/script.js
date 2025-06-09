async function Call(id) {
    try {
        let persona = await fetch(`BackEnd/backend.php?tipo=${id}`); 
        persona = await persona.json();


        const tbody = document.getElementById('respuesta');

        if (typeof persona === 'object' && persona.error) {
            // Limpiamos la tabla y mostramos mensaje en una fila que ocupa todas las columnas
            tbody.innerHTML = '';
            const tr = document.createElement('tr');
            tbody.appendChild(tr);
            const td = document.createElement('td');
            td.colSpan = 3; // Para que ocupe todas las columnas
            td.textContent = persona.error;
            tr.appendChild(td);
            return;
        }

        
        const tr = document.createElement('tr');
        tbody.appendChild(tr);

        for (const [clave, valor] of Object.entries(persona)) {
            const td = document.createElement('td');
            td.textContent = valor;
            tr.appendChild(td);
        }
    } catch (error) {
         document.getElementById("respuesta").innerHTML = "Error al obtener la respuesta";
         console.error(error);
    }
}
function Borrar(){
    const tbody = document.getElementById('respuesta');
    tbody.innerHTML = '';
}
