let slideIndex = 1;
const slideTexts = [
    "Il teatro comunale di Ferrara è il più importante teatro della città,<br>costruito tra il 1773 ed il 1797 su progetto di Antonio Foschini e Cosimo Morelli.<br>Si trova in corso Martiri della Libertà, in pieno centro storico a pochi metri dal Castello Estense.",
    "Questo magnifico teatro, con i suoi eleganti palchi decorati, soffitti affrescati e dettagli raffinati, rappresenta un capolavoro dell'architettura teatrale classica.<br>Un gioiello nel cuore della città, capace di trasportare ogni visitatore in un'epoca di splendore e raffinatezza.",
    "Una prospettiva mozzafiato dall’alto che svela l’elegante struttura a ferro di cavallo del teatro.<br>I palchi dorati e la raffinata illuminazione creano un'atmosfera unica, mentre il palco domina al centro, pronto a ospitare spettacoli di grande fascino.",
    "Una vista frontale della maestosa platea e dei palchi, con il soffitto affrescato che racconta storie di un’epoca passata. Ogni dettaglio architettonico parla di tradizione, arte e passione, rendendo il teatro un simbolo di eccellenza culturale.",
    "Dal palco, lo sguardo abbraccia una platea accogliente, progettata per offrire un'acustica straordinaria e un'intimità unica con lo spettacolo.<br>Ogni dettaglio, dalle decorazioni alle luci soffuse, è pensato per rendere ogni rappresentazione un evento memorabile."
];

// Funzione per mostrare le immagini
function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    // Ciclo per il cambiamento delle immagini
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }

    // Nascondi tutte le immagini
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Rimuovi la classe "active" da tutti i pallini
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    // Mostra l'immagine corrente
    slides[slideIndex - 1].style.display = "block";
    // Aggiungi la classe "active" al pallino corrispondente
    dots[slideIndex - 1].className += " active";

    // Cambia il testo in base all'indice dell'immagine
    document.getElementById("slideText").innerHTML = slideTexts[slideIndex - 1];
}

// Funzioni per i controlli (next/prev e dot)
function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}