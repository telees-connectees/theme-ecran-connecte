listeBlob = document.querySelectorAll(".bg-blob");

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}

listeBlob.forEach((blob) => {
    blob.style.left = (getRandomInt(window.innerWidth) - 400).toString() + "px";
    blob.style.top = (getRandomInt(window.innerHeight) - 50).toString() + "px";
    blob.style.width = (600 + getRandomInt(700)).toString() + "px";
    blob.style.animation = 'blobAnimation infinite ' + (getRandomInt(5) + 3) + "s " + (getRandomInt(10) / 3) + "s"
})