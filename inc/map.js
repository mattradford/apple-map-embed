document.addEventListener("DOMContentLoaded", function(event) { 

    mapkit_vars;
    
    mapkit.init({  
        authorizationCallback: function(done) {
            done(mapkit_vars.mapkit_jwt_token);
        }
    });

    var lat = 44.808655;
    var lon = 20.432128;

    var WordCamp = new mapkit.CoordinateRegion(
        new mapkit.Coordinate(lat , lon),
        new mapkit.CoordinateSpan(0.005, 0.005)
    );
    
    var map = new mapkit.Map("map");
    map.region = WordCamp;

});