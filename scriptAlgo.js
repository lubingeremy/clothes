// Initialize library and start tracking time
TimeMe.initialize({
    currentPageName: "my-home-page", // current page
    idleTimeoutInSeconds: 30 // seconds
});

// ... Some time later ...

// Retrieve time spent on current page
let timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();
let step = 5
let points = 3
let palier = step
let cookie
const category = document.getElementById('category').innerText
console.log(category)

function pointsCount(){
    if(TimeMe.getTimeOnCurrentPageInSeconds() >= palier){
        palier+=step
        points = points + 1;
        cookie = category + "=" + points;
        document.cookie = cookie;
        // console.log(true)
    }
}

compteur = setInterval(pointsCount,1000);

