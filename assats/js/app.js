var slider = tns({
    container: '.my-slider',
    controls:   false,
    nav:        false,
    autoplayButtonOutput:   false,
    items:          1,
    speed :     1400,
    autoplayTimeout : 2000,
    autoplay :  true,
    autoplayHoverPause: true,
    // rewind: true,
    responsive: {
      640: {
        edgePadding: 20,
        gutter: 20,
        items: 2
      },
      700: {
        gutter: 30
      },
      900: {
        items: 1
      }
    },
  });


