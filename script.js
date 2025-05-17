function Call1(){
    const res = 'Buenos dias';
    document.getElementById("respuesta").innerHTML = res;
}
async function Call2(){
    try {
    const res = await fetch("backend.php");
    const data = await res.json(); //convierte JSON a string o objeto js
    document.getElementById("respuesta").innerHTML = data;
    } catch (error){
        document.getElementById("respuesta").innerHTML = "Error al obtener la respuesta";
        console.error(error);
    }
}
        