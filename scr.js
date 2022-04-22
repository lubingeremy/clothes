// Initialize library and start tracking time
TimeMe.initialize({
    currentPageName: "my-home-page", // current page
    idleTimeoutInSeconds: 30 // seconds
});


let timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();
const step = 5;
let palier = step;



const category = document.getElementById('category').innerText;

let compteur = document.getElementById('compteur');
var cookies = []

var cookiesList = document.cookie.split('; ');
let i;
for (i=1;i<=4;i++){
    if (cookiesList[i].split("=")[0] === category){
        uniqueCookie = [cookiesList[i].split("=")[0], parseInt(cookiesList[i].split("=")[1])];
    } else {
        if(cookiesList[i].split("=")[1] >= 1){
            cookies.push([cookiesList[i].split("=")[0],parseInt(cookiesList[i].split("=")[1])]);
        }
    }
}

function getPoints(){
    for (let i = 0; i < cookies.length; i++){
        if (category == cookies[i][0]){
            return cookies[i][1]
        }
    }
}

var points = getPoints();


/////////////////////////////////////////////////////////////
///////////////Compute cookies point/////////////////////////
/////////////////////////////////////////////////////////////

function updatePoints(line){
    updatedCookie = line[0] + "=" + line[1];
    document.cookie = updatedCookie + "; 0; path=/";
}

function removePoint(){
    let key = 0;
    let selectedCookie = cookies[0];
    for (let i=1; i < cookies.length; i++){
        if (selectedCookie[1] <= cookies[i][1] && cookies[i][1] > 0){
            selectedCookie = cookies[i];
            key = i;
        }
    }
    if (cookies[key][1] <= 0){
        return "Minimum point reached"
    }
    cookies[key][1] -= 1;
    updatePoints(cookies[key]);
    console.log(cookies);
    return true;
}

function countPoints(){
    // console.log("countPoints")
    let timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();
    compteur.innerText = timeSpentOnPage;
    // console.log(typeof(timeSpentOnPage));
    if (timeSpentOnPage >= palier){
        palier += step;
        if(uniqueCookie[1] < 12){
            if (removePoint()){
                // oldValue = uniqueCookie[1];
                // points = points + 1;
                uniqueCookie[1] += 1;
                // cookies[category] = points
                cookie = category + "=" + uniqueCookie[1];

                document.cookie = cookie + "; 0; path=/";

                console.log("test " + uniqueCookie[1])
            }
        }
        else{
            console.log("Maximum points reached")
            clearInterval(lp);
        }
    }
}

let lp = setInterval(countPoints,1000)
