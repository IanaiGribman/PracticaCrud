/*async function Call(id){
    if (id == 1){
         try {
            let res = await fetch("backend.php?tipo=1");
            res = await res.json(); //convierte JSON a string o objeto js
            document.getElementById("respuesta").innerHTML = res;
        } catch (error){
            document.getElementById("respuesta").innerHTML = "Error al obtener la respuesta";
            console.error(error);
        }
    }
    else{
        try {
            let res = await fetch("backend.php?tipo=2");
            res = await res.json(); //convierte JSON a string o objeto js
            document.getElementById("respuesta").innerHTML = res;
        } catch (error){
            document.getElementById("respuesta").innerHTML = "Error al obtener la respuesta";
            console.error(error);
        }
    }
}*/
async function Call(id) {
    try {
        let res = await fetch(`backend.php?tipo=${id}`);
        res = await res.json();
        document.getElementById("respuesta").innerHTML = res;
    } catch (error) {
        document.getElementById("respuesta").innerHTML = "Error al obtener la respuesta";
        console.error(error);
    }
}