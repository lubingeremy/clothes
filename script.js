// Initialize library and start tracking time
TimeMe.initialize({
    currentPageName: "my-home-page", // current page
    idleTimeoutInSeconds: 30 // seconds
});

// ... Some time later ...

// Retrieve time spent on current page

// class Category{
//     constructor(){
//         this.pointsArticle = 3
//     }
// }

// var casual = new Category();

// if(!empty(casual)){
//     console.log("True ?")
// } else{
//     console.log(False)
// }

let timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();

let compteur;
let cmpteAff = document.getElementById('compteur');

let lancerButton = document.getElementById('lancerButton');
let stopButton = document.getElementById('stopButton');

var palier = 5;
var points = 0;
const category = document.getElementById('category').innerText
console.log(category);
let cookie = null;
lancerButton.addEventListener("click", lancer);
stopButton.addEventListener("click", stopN);

function sow(){
    // let timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();
    cmpteAff.innerText = timeSpentOnPage;
    // console.log(typeof(timeSpentOnPage));
    if (timeSpentOnPage >= palier){
        palier = palier + 5;
        points = points + 1;
        cookie = "cookiepoints=" + points;
        document.cookie = cookie;
    }
}
function lancer(){
    console.log(true)
    compteur = setInterval(sow,1000);
}
function stopN(){
    console.log(false)
    clearInterval(compteur);
    compteur = null;
}