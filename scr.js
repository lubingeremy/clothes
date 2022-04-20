// Initialize library and start tracking time
TimeMe.initialize({
    currentPageName: "my-home-page", // current page
    idleTimeoutInSeconds: 30 // seconds
});


console.log(document.getElementById('category').innerHTML);


console.log(typeof(document.cookie))
console.log(document.cookie)

var cookies = document.cookie.split(';')
console.log(cookies)