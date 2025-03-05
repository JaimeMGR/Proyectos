// Globals
let nextArticleID = 1;
const visibleAds = new Set();
let previouslyVisibleAds = null;
let adObserver;

// On page load
window.addEventListener("DOMContentLoaded", () => {
    const contentBox = document.querySelector("main");
    setupIntersectionObserver();
    populateContent(contentBox);
    setInterval(updateTimers, 1000);
});

// Setup Intersection Observer
function setupIntersectionObserver() {
    const observerOptions = { root: null, threshold: [0.0, 0.75] };

    adObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const adBox = entry.target;

            if (entry.isIntersecting && entry.intersectionRatio >= 0.75) {
                adBox.dataset.lastViewStarted = performance.now();
                visibleAds.add(adBox);
            } else {
                visibleAds.delete(adBox);
                if (entry.intersectionRatio === 0.0 && adBox.dataset.totalViewTime >= 60000) {
                    replaceAd(adBox);
                }
            }
        });
    }, observerOptions);
}

// Populate articles and ads
function populateContent(contentBox) {
    for (let i = 0; i < 5; i++) {
        contentBox.appendChild(createArticle(`This is the content of Article ${nextArticleID}`));
        if (i % 2 === 0) createAd(contentBox);
    }
}

// Create an article
function createArticle(content) {
    const article = document.createElement("article");
    article.innerHTML = `<h2>Article ${nextArticleID}</h2><p>${content}</p>`;
    nextArticleID++;
    return article;
}

// Create an ad
function createAd(container) {
    const adData = getRandomAd();
    const adBox = document.createElement("div");
    adBox.className = "ad";
    adBox.style.backgroundColor = adData.bgcolor;
    adBox.innerHTML = `
        <h2>${adData.title}</h2>
        <p>${adData.body}</p>
        <div class="timer">0:00</div>
    `;
    adBox.dataset.totalViewTime = "0";
    container.appendChild(adBox);
    adObserver.observe(adBox);
}

// Replace ad when expired
function replaceAd(adBox) {
    const adData = getRandomAd();
    adBox.style.backgroundColor = adData.bgcolor;
    adBox.querySelector("h2").textContent = adData.title;
    adBox.querySelector("p").textContent = adData.body;
    adBox.dataset.totalViewTime = "0";
    adBox.querySelector(".timer").textContent = "0:00";
}

// Update visible ad timers
function updateTimers() {
    visibleAds.forEach((adBox) => {
        const currentTime = performance.now();
        const lastView = parseFloat(adBox.dataset.lastViewStarted || currentTime);
        const elapsed = currentTime - lastView;
        adBox.dataset.totalViewTime = parseFloat(adBox.dataset.totalViewTime) + elapsed;
        adBox.dataset.lastViewStarted = currentTime;

        const totalSeconds = Math.floor(adBox.dataset.totalViewTime / 1000);
        const minutes = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;
        adBox.querySelector(".timer").textContent = `${minutes}:${seconds.toString().padStart(2, "0")}`;
    });
}

// Get a random ad
function getRandomAd() {
    const ads = [
        { bgcolor: "#cec", title: "Eat Green Beans", body: "They're good for you!" },
        { bgcolor: "aquamarine", title: "Free eBooks", body: "Read online for free!" },
        { bgcolor: "lightgrey", title: "Novel Ideas", body: "A book for every mood." },
        { bgcolor: "#fee", title: "Florist Deals", body: "Send flowers to loved ones." }
    ];
    return ads[Math.floor(Math.random() * ads.length)];
}
