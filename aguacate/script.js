const canvas = document.getElementById('parkingCanvas');
const ctx = canvas.getContext('2d');

const totalSpaces = 40;
const occupiedSpaces = 20;

const barWidth = 30;
const barSpacing = 10;
const startY = canvas.height - 50;

// // Dibujar barras de espacios ocupados
// ctx.fillStyle = 'red';
// for (let i = 0; i < occupiedSpaces; i++) {
//     ctx.fillRect(i * (barWidth + barSpacing), startY, barWidth, -40);
// }

// // Dibujar barras de espacios disponibles
// ctx.fillStyle = 'green';
// for (let k = 0; k < occupiedSpaces; k++) {
//     ctx.fillRect(k * (barWidth + barSpacing), startY, barWidth, -40);
// }

// Etiquetas de leyenda
ctx.fillStyle = 'black';
ctx.fillText(`Cupos Ocupados: ${occupiedSpaces} / ${totalSpaces}`, 10, startY - 10);
ctx.fillText(`Cupos Disponibles: ${totalSpaces - occupiedSpaces} / ${totalSpaces}`, 10, startY + 30);
