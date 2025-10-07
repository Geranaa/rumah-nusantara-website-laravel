import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const galleryItems = document.querySelectorAll(".gallery-items");
    const previewImage = document.getElementById("previewImage");
    const previewVideo = document.getElementById("previewVideo");

    previewImage.addEventListener("click", function () {
        tampilkanLayarPenuh(this);
    });

    galleryItems.forEach((item) => {
        item.addEventListener("click", function () {
            const imgSrc = this.getAttribute("data-src");
            if (imgSrc.includes("youtube.com")) {
                window.showVideo(imgSrc);
            } else {
                previewVideo.classList.add("hidden");
                previewImage.classList.remove("hidden");
                previewImage.src = imgSrc;
            }
        });
    });

    const carousel = document.getElementById("carousel");
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");

    if (carousel && prevButton && nextButton) {
        let counter = 0;
        const images = carousel.children;
        const imageWidth = images[0].offsetWidth;

        nextButton.addEventListener("click", () => {
            counter++;
            if (counter >= images.length) {
                counter = 0;
            }
            carousel.style.transform = `translateX(-${counter * imageWidth}px)`;
        });

        prevButton.addEventListener("click", () => {
            counter--;
            if (counter < 0) {
                counter = images.length - 1;
            }
            carousel.style.transform = `translateX(-${counter * imageWidth}px)`;
        });
    } else {
        console.error("One or more elements not found.");
    }

    window.showVideo = function showVideo(videoUrl) {
        let embedUrl = videoUrl;
        if (videoUrl.includes("youtube.com")) {
            const videoId = videoUrl.match(/[?&]v=([^&]+)/)?.[1];
            if (videoId) {
                embedUrl = `https://www.youtube.com/embed/${videoId}`;
            }
        }
        previewImage.classList.add("hidden");
        previewVideo.src = embedUrl;
        previewVideo.classList.remove("hidden");
    };

    function tampilkanLayarPenuh(elemen) {
        if (elemen.requestFullscreen) {
            elemen.requestFullscreen();
        } else if (elemen.mozRequestFullScreen) {
            elemen.mozRequestFullScreen();
        } else if (elemen.webkitRequestFullscreen) {
            elemen.webkitRequestFullscreen();
        } else if (elemen.msRequestFullscreen) {
            elemen.msRequestFullscreen();
        }
    }
});
