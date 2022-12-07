var slider = tns({
    container: '.slider',
    speed :1000,
    autoplayTimeout : 2000,
    // items: 1,
    autoplay : true,
    controls: false,
    nav:false,
    autoplayButtonOutput: false,
    slideBy: "page",
    mouseDrag: true,
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
    }
  });