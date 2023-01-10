
initPDFViewer=()=>{
  $("#pdfViewerDiv").html("")
  pdfjsLib.getDocument("public/storage/post-dokumen/sample.pdf").promise.then(pdfDoc=>{
    // console.log(pdfDoc)
    let pages = pdfDoc._pdfInfo.numPages
    for(let i=1; i<=pages; i++){
      pdfDoc.getPage(i).then(page=>{
        // console.log(page)
        let pdfCanvas = document.createElement("canvas")
        let context = pdfCanvas.getContext("2d")
        let pageViewPort = page.getViewport({scale:1})
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