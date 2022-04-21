// Initialize library and start tracking time
TimeMe.initialize({
    currentPageName: "my-home-page", // current page
    idleTimeoutInSeconds: 30 // seconds
});


let timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();
const step = 5;
let palier = step;



const category = document.getElementById('category').innerText;



console.log(typeof(document.cookie))
console.log(document.cookie)

let compteur = document.getElementById('compteur');
// compteur = "yell"
let i;
var cookies = {}

var cookiesList = document.cookie.split('; ');
console.log(cookies);
for (i=1;i<=4;i++){
    cookies[cookiesList[i].split("=")[0]] = parseInt(cookiesList[i].split("=")[1]);
}

function getPoints(){
    switch (category){
    case "boheme":
        return cookies['boheme']
        break
    case "glamour":
        return cookies['glamour']
        break
    case "streetwear":
        return cookies['streetwear']
        break
    case "casual":
        return cookies['casual']
        break
    
    }
}


///////////////////////////////////////////////////////////
// getCookie("username");
///////////////////////////////////////////////////////////

var points = getPoints();

function countPoints(){
    // console.log("countPoints")
    let timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();
    compteur.innerText = timeSpentOnPage;
    // console.log(typeof(timeSpentOnPage));
    if (timeSpentOnPage >= palier){
        palier += step;
        if(cookies[category] < 12){
            oldValue = cookies[category]
            points = points + 1;
            cookies[category] = points
            cookie = category + "=" + points;

            document.cookie = cookie + "; 0; path=/";

            console.log("test " + points)
        }
    }
}

let lp = setInterval(countPoints,1000)

