//personaje de tv
let nombre = "bob esponja";
let anime = "nick";
let edad = 16;
let personaje = {
nombre:"bobj esponja",
anime: "nick",
edad:16
};

console.log(personaje);
console.log(personaje.anime);
console.log(personaje["anime"]);

//para modificar un atributo
personaje.edad = 34;
personaje['edad'] = 34;


delete personaje.nombre;