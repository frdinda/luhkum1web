$(document).ready(function() {
    $('#table-pertanyaan-all').DataTable({
        "dom": '<"toolbar">ftp',
        // "dom": '<"toolbar">frtp',
        // "dom": "<'row'<'col-sm-6 col-md-12 col-xl-12'><'col-sm-12 col-md-6'f>>" +
        // "<'row'<'col-sm-12'tr>>" +
        // "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "info": false,
        "ordering": false,
        // gimana caranya ini order berubah2 terus
        // "order": [[ 0, "asc" ]],
        "oLanguage": {
            "sSearch": "Search"
          },
    });
} );

$(document).ready(function() {
    $('#table-dashgen-all').DataTable({
        "dom": '<"toolbar">frtp',
        // "dom": '<"toolbar">frtp',
        // "dom": "<'row'<'col-sm-6 col-md-12 col-xl-12'><'col-sm-12 col-md-6'f>>" +
        // "<'row'<'col-sm-12'tr>>" +
        // "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "info": false,
        // gimana caranya ini order berubah2 terus
        "order": [[ 0, "DESC" ]],
        "oLanguage": {
            "sSearch": "Search"
          },
    });
} );

$(document).ready(function() {
  $('#table-user-all').DataTable({
      "dom": '<"toolbar">frtp',
      // "dom": '<"toolbar">frtp',
      // "dom": "<'row'<'col-sm-6 col-md-12 col-xl-12'><'col-sm-12 col-md-6'f>>" +
      // "<'row'<'col-sm-12'tr>>" +
      // "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "info": false,
      // gimana caranya ini order berubah2 terus
      "order": [[ 0, "DESC" ]],
      "oLanguage": {
          "sSearch": "Search"
        },
  });
} );

$(document).ready(function() {
  $('#table-detail-user').DataTable({
      "dom": '<"toolbar">t',
      // "dom": '<"toolbar">frtp',
      // "dom": "<'row'<'col-sm-6 col-md-12 col-xl-12'><'col-sm-12 col-md-6'f>>" +
      // "<'row'<'col-sm-12'tr>>" +
      // "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "info": false,
      "ordering": false,
      // gimana caranya ini order berubah2 terus
      // "order": [[ 0, "asc" ]],
      "oLanguage": {
          "sSearch": "Search"
        },
  });
} );

$(document).ready(function() {
  $('#table-podcast-all').DataTable({
      "dom": '<"toolbar">frtp',
      // "dom": '<"toolbar">frtp',
      // "dom": "<'row'<'col-sm-6 col-md-12 col-xl-12'><'col-sm-12 col-md-6'f>>" +
      // "<'row'<'col-sm-12'tr>>" +
      // "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "info": false,
      // gimana caranya ini order berubah2 terus
      "order": [[ 1, "ASC" ]],
      "oLanguage": {
          "sSearch": "Search"
        },
  });
} );

// $(document).ready(function() {
//     $('#isi-pertanyaan').summernote();
//   });

  $(document).ready(function() {
    $('#isi-jawaban').summernote();
  });


  $(document).ready(function() {
    $('#hasil-akhir-konsultasi').summernote();
  });

  $(document).ready(function() {
    $('#kesan-konsultan').summernote();
  });

  $(document).ready(function() {
    $('#nasihat-yuridis').summernote();
  });

  $(document).ready(function() {
    $('#isi_artikel').summernote();
  });

  $(document).ready(function() {
    $('#caption_podcast').summernote();
  });



  // TTD
  (function() {
    window.requestAnimFrame = (function(callback) {
      return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimaitonFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 / 60);
        };
    })();
  
    var canvas = document.getElementById("sig-canvas");
    var ctx = canvas.getContext("2d");
    ctx.strokeStyle = "#222222";
    ctx.lineWidth = 2;
  
    var drawing = false;
    var mousePos = {
      x: 0,
      y: 0
    };
    var lastPos = mousePos;
  
    canvas.addEventListener("mousedown", function(e) {
      drawing = true;
      lastPos = getMousePos(canvas, e);
    }, false);
  
    canvas.addEventListener("mouseup", function(e) {
      drawing = false;
    }, false);
  
    canvas.addEventListener("mousemove", function(e) {
      mousePos = getMousePos(canvas, e);
    }, false);
  
    // Add touch event support for mobile
    canvas.addEventListener("touchstart", function(e) {
  
    }, false);
  
    canvas.addEventListener("touchmove", function(e) {
      var touch = e.touches[0];
      var me = new MouseEvent("mousemove", {
        clientX: touch.clientX,
        clientY: touch.clientY
      });
      canvas.dispatchEvent(me);
    }, false);
  
    canvas.addEventListener("touchstart", function(e) {
      mousePos = getTouchPos(canvas, e);
      var touch = e.touches[0];
      var me = new MouseEvent("mousedown", {
        clientX: touch.clientX,
        clientY: touch.clientY
      });
      canvas.dispatchEvent(me);
    }, false);
  
    canvas.addEventListener("touchend", function(e) {
      var me = new MouseEvent("mouseup", {});
      canvas.dispatchEvent(me);
    }, false);
  
    function getMousePos(canvasDom, mouseEvent) {
      var rect = canvasDom.getBoundingClientRect();
      return {
        x: mouseEvent.clientX - rect.left,
        y: mouseEvent.clientY - rect.top
      }
    }
  
    function getTouchPos(canvasDom, touchEvent) {
      var rect = canvasDom.getBoundingClientRect();
      return {
        x: touchEvent.touches[0].clientX - rect.left,
        y: touchEvent.touches[0].clientY - rect.top
      }
    }
  
    function renderCanvas() {
      if (drawing) {
        ctx.moveTo(lastPos.x, lastPos.y);
        ctx.lineTo(mousePos.x, mousePos.y);
        ctx.stroke();
        lastPos = mousePos;
      }
    }
  
    // Prevent scrolling when touching the canvas
    document.body.addEventListener("touchstart", function(e) {
      if (e.target == canvas) {
        e.preventDefault();
      }
    }, false);
    document.body.addEventListener("touchend", function(e) {
      if (e.target == canvas) {
        e.preventDefault();
      }
    }, false);
    document.body.addEventListener("touchmove", function(e) {
      if (e.target == canvas) {
        e.preventDefault();
      }
    }, false);
  
    (function drawLoop() {
      requestAnimFrame(drawLoop);
      renderCanvas();
    })();
  
    function clearCanvas() {
      canvas.width = canvas.width;
    }
  
    // Set up the UI
    var sigText = document.getElementById("sig-dataUrl");
    var sigImage = document.getElementById("sig-image");
    var clearBtn = document.getElementById("sig-clearBtn");
    var submitBtn = document.getElementById("sig-submitBtn");
    clearBtn.addEventListener("click", function(e) {
      clearCanvas();
      sigText.innerHTML = "Data URL for your signature will go here!";
      sigImage.setAttribute("src", "");
    }, false);
    // $('#sig-canvas').change(function(){
    //   var dataUrl = canvas.toDataURL();
    // sigText.innerHTML = dataUrl;
    // sigImage.setAttribute("src", dataUrl);
    // });
    canvas.addEventListener("click", function(e) {
      var dataUrl = canvas.toDataURL();
      sigText.innerHTML = dataUrl;
      sigImage.setAttribute("src", dataUrl);
      // $.ajax({
      //     url: "tanya/ta33nyaa",
      //     type: "POST",
      //     data: {
      //       dataUrl:dataUrl
      //     }
      // });
    }, false);
  
  })();