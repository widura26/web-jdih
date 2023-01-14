<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $document->judul }}</title>
</head>
<body>
  <div id="pdfViewerDiv" class="container-canvas"></div>
</body>
<script>
  initPDFViewer = () =>{
    $("#pdfViewerDiv").html("")
    pdfjsLib.getDocument("{{ asset('storage/'. $document->dokumen ) }}").promise.then(pdfDoc=>{
      // console.log(pdfDoc)
      let pages = pdfDoc._pdfInfo.numPages
      for(let i=1; i<=pages; i++){
        pdfDoc.getPage(i).then(page=>{
          // console.log(page)
          let pdfCanvas = document.createElement("canvas")
          let context = pdfCanvas.getContext("2d")
          let pageViewPort = page.getViewport({scale:3})
          // console.log(pageViewPort)
          pdfCanvas.width = pageViewPort.width
          pdfCanvas.height = pageViewPort.height
          $("#pdfViewerDiv").append(pdfCanvas)
          page.render({
            canvasContext:context,
            viewport:pageViewPort
          })
        }).catch(pageErr=>{
          console.log(pageErr)
        })
      }
    }).catch(pdfErr=>{
      console.log(pdfErr)
    })
  }

  $(function(){
    initPDFViewer()
  })
</script>
</html>