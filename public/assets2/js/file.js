class Main{
  url = "{{ asset('assets/js/file.js') }}";

  static pfDoc = null;
  static pageNum = 1;
  static numPages = 0;

  constructor(){
    this.getData(this.pageNum);

  }getData(pageNum){
    pdfjsLib.getDocument(this.url)
    .promise.then(res => {
      console.log(res);
      Main.pdfDoc = res;
      Main.numPages = Main.pdfDoc.numPages;
    });
  }
}