(function (){
    let slideIndex = 1;
    function showSlides(n) {
        let slides = document.getElementsByClassName("slide");
        let totalSlides = slides.length;

        if (n > totalSlides - 3) {
            slideIndex = totalSlides - 3; 
        } else if (n < 1) {
            slideIndex = 1; 
        } else {
            slideIndex = n;
        }

        for (let i = 0; i < totalSlides; i++) {
            slides[i].style.display = "none";
        }

        for (let i = slideIndex - 1; i < slideIndex + 5; i++) {
            if (slides[i]) {
                slides[i].style.display = "inline-block";
            }
        }
        updateArrows();
    }
    function updateArrows() {
        let slides = document.getElementsByClassName("slide");
        let totalSlides = slides.length;


        if (slideIndex === 1) {
            document.getElementById("prev").style.display = "none";
        } else {
            document.getElementById("prev").style.display = "inline-block";
        }

        if (slideIndex + 5 >= totalSlides) {
            document.getElementById("next").style.display = "none";
        } else {
            document.getElementById("next").style.display = "inline-block";
        }
    }
    function plusSlides(n) {
        slideIndex += n;

        showSlides(slideIndex);
    }
    showSlides(slideIndex);
    document.getElementById("next").onclick = () => plusSlides(1);
    document.getElementById("prev").onclick = () => plusSlides(-1);
})();
