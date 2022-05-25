// Initialize library and start tracking time
TimeMe.initialize({
    currentPageName: "my-home-page", // current page
    idleTimeoutInSeconds: 30 // seconds
});


let timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();
const step = 10;
let palier = step;



const category = document.getElementById('category').innerText;

// let compteur = document.getElementById('compteur');
var cookies = []

var cookiesList = document.cookie.split('; ');
let i;

// Fecth cookies
for (i=0;i<=4;i++){
    if (cookiesList[i].split("=")[0] != "PHPSESSID" && cookiesList[i].split("=")[0] != "__cfruid"){
        if (cookiesList[i].split("=")[0] === category){
            uniqueCookie = [cookiesList[i].split("=")[0], parseInt(cookiesList[i].split("=")[1])];
        } else {
            if(cookiesList[i].split("=")[1] >= 1){
                cookies.push([cookiesList[i].split("=")[0],parseInt(cookiesList[i].split("=")[1])]);
            }
        }
    }
}

// Fetch points of current article's category
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
    } else{
        cookies[key][1] -= 1;
        updatePoints(cookies[key]);
        console.log(cookies);
        return true;
    }
}

function addPoint(){
    if(uniqueCookie[1] < 12){
        if (removePoint()){
            uniqueCookie[1] += 1;
            cookie = category + "=" + uniqueCookie[1];
            document.cookie = cookie + "; 0; path=/";
            // console.log("update " + uniqueCookie[0] +uniqueCookie[1])
            return(true)
        }
    }
    else{
        // console.log("Maximum points reached")
        return(false)
    }
}

function countPoints(){
    // console.log("countPoints")
    let timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();
    // compteur.innerText = timeSpentOnPage;
    // console.log(typeof(timeSpentOnPage));
    if (timeSpentOnPage >= palier){
        palier += step;
        addP = addPoint();
        if(!addP){
            clearInterval(lp);
        }
    }
}

// addPoint();

// let lp = setInterval(countPoints,1000)
