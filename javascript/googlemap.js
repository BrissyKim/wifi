var data = [];

document.addEventListener('DOMContentLoaded', function() {

  var maps = document.querySelectorAll('.map');
  Array.prototype.forEach.call(maps, function(Element, index) {

    var coords = Element.innerHTML.split(",");


    var mapProp = {
      center: new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1])),
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    data.push(Element.innerHTML);

    var map = new google.maps.Map(Element, mapProp);

    var marker = new google.maps.Marker({
      map: map,
      draggable: false,
      title: coords[2],
      animation: google.maps.Animation.DROP,
      position: {
        lat: parseFloat(coords[0]),
        lng: parseFloat(coords[1])
      }
    });
  });
});

document.addEventListener('DOMContentLoaded', function() {

  var maps = document.querySelectorAll('.map1');
  // var name = <?php echo $result ?>;



  Array.prototype.forEach.call(maps, function(Element, index) {

    // var coords = data[0].split(",");

    for (i = 0; i <= data.length - 1; i++) {
      var pos = data[i].split(',');
      var mapProp = {
        center: new google.maps.LatLng(parseFloat(pos[0]), parseFloat(pos[1])),
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(Element, mapProp);


      for (i = 0; i <= data.length - 1; i++) {
        var pos = data[i].split(',');

        var marker = new google.maps.Marker({
          map: map,
          draggable: false,
          title: pos[2],
          animation: google.maps.Animation.DROP,
          position: {
            lat: parseFloat(pos[0]),
            lng: parseFloat(pos[1])
          },
        });
      }
    }
  });
});
