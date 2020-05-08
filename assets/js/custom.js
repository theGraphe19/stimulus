/*$(document).ready(function () {
    var userFeed = new Instafeed({
        get: "user",
        userId: "3983405194",
        limit: 9,
        resolution: "standard_resolution",
        accessToken: "3983405194.1677ed0.d2bd7fe0f0a84cbfa88fd90279ef1b7c",
        sortBy: "most-recent",
        template: '<div class= "col-lg-4 col-md-6 col-sm-6 col-xs-12"><img src="{{image}}" alt="{{caption}}"></div>'
    });
    userFeed.run();
});*/


var galleryFeed = new Instafeed({
    get: "user",
    userId: 9474697825,
    accessToken: "9474697825.1677ed0.e18ab9ddee604b5cb56daff9722b3cac",
    resolution: "standard_resolution",
    useHttp: "true",
    limit: 5,
    sortBy: "most-recent",
    template: '<div class="pure-u-xl-1-4 insta-img"><a href="{{link}}" target="_blank" id="{{id}}"><div class="img-featured-container"> <img src="{{image}}" class="img-responsive"><div class="img-backdrop"><span class="likes"><i class="fas fa-heart"></i> {{likes}}&nbsp;&nbsp;<i class="fas fa-comment"></i> {{comments}}</span><br/><p>{{caption}}</p></div></div></a></div>',
    
    target: "gallery-feed",
    after: function () {
        // disable button if no more results to load
        if (!this.hasNext()) {
            btnInstafeedLoad.setAttribute('disabled', 'disabled');
        }
    },
});
galleryFeed.run();

// var btnInstafeedLoad = document.getElementById("btn-instafeed-load");
// btnInstafeedLoad.addEventListener("click", function () {
//     galleryFeed.next()
// });