function printHorario(){
  var pdf = new jsPDF('p', 'pt', 'letter', 'landscape');
  source = $('#pdf')[0];
  specialElementHandlers = {
   '#bypassme': function(element, renderer){
    return true
  }
}
margins = {
  top: 50,
  left: 80,
  width: 450
};
pdf.fromHTML(
  	source // HTML string or DOM elem ref.
  	, margins.left // x coord
  	, margins.top // y coord
  	, {
  		'width': margins.width // max width of content on PDF
  		, 'elementHandlers': specialElementHandlers
  	},
  	function (dispose) {
  	  // dispose: object with X, Y of the last line add to the PDF
  	  //          this allow the insertion of new lines after html
      pdf.save('Horário.pdf');
    }
    )		
}

function printHistorico(){
  var pdf = new jsPDF('p', 'pt', 'letter');
  source = $('#pdf')[0];
  specialElementHandlers = {
   '#bypassme': function(element, renderer){
    return true
  }
}
margins = {
  top: 50,
  left: 80,
  width: 500
};
pdf.fromHTML(
    source // HTML string or DOM elem ref.
    , margins.left // x coord
    , margins.top // y coord
    , {
      'width': margins.width // max width of content on PDF
      , 'elementHandlers': specialElementHandlers
    },
    function (dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html

      
      pdf.save('Histórico.pdf');
    }
    )   
}

function Boletim1(){
  var pdf = new jsPDF('p', 'pt', 'letter');
  source = $('#boletim1')[0];
  specialElementHandlers = {
    '#bypassme': function(element, renderer){
      return true
    }
  }
  margins = {
    top: 50,
    left: 80,
    width: 450
  };
  pdf.fromHTML(
    source // HTML string or DOM elem ref.
    , margins.left // x coord
    , margins.top // y coord
    , {
      'width': margins.width // max width of content on PDF
      , 'elementHandlers': specialElementHandlers
    },
    function (dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html


      pdf.save('Boletim 1º Bimestre.pdf');
    }
    )   
}

function Boletim2(){
  var pdf = new jsPDF('p', 'pt', 'letter');
  source = $('#boletim2')[0];
  specialElementHandlers = {
   '#bypassme': function(element, renderer){
    return true
  }
}
margins = {
  top: 50,
  left: 80,
  width: 450
};
pdf.fromHTML(
    source // HTML string or DOM elem ref.
    , margins.left // x coord
    , margins.top // y coord
    , {
      'width': margins.width // max width of content on PDF
      , 'elementHandlers': specialElementHandlers
    },
    function (dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html

      
      pdf.save('Boletim 2º Bimestre.pdf');
    }
    )   
}



function Boletim3(){
  var pdf = new jsPDF('p', 'pt', 'letter');
  source = $('#boletim3')[0];
  specialElementHandlers = {
   '#bypassme': function(element, renderer){
    return true
  }
}
margins = {
  top: 50,
  left: 80,
  width: 450
};
pdf.fromHTML(
    source // HTML string or DOM elem ref.
    , margins.left // x coord
    , margins.top // y coord
    , {
      'width': margins.width // max width of content on PDF
      , 'elementHandlers': specialElementHandlers
    },
    function (dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html

      
      pdf.save('Boletim 3º Bimestre.pdf');
    }
    )   
}


function Boletim4(){
  var pdf = new jsPDF('p', 'pt', 'letter');
  source = $('#boletim4')[0];
  specialElementHandlers = {
   '#bypassme': function(element, renderer){
    return true
  }
}
margins = {
  top: 50,
  left: 80,
  width: 450
};
pdf.fromHTML(
    source // HTML string or DOM elem ref.
    , margins.left // x coord
    , margins.top // y coord
    , {
      'width': margins.width // max width of content on PDF
      , 'elementHandlers': specialElementHandlers
    },
    function (dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html

      
      pdf.save('Boletim 4º Bimestre.pdf');
    }
    )   
}


function Declaracao(){
  var pdf = new jsPDF('p', 'pt', 'letter');
  source = $('#Declaracao')[0];
  specialElementHandlers = {
   '#bypassme': function(element, renderer){
    return true
  }
}
margins = {
  top: 50,
  left: 55,
  width: 500
};
pdf.fromHTML(
    source // HTML string or DOM elem ref.
    , margins.left // x coord
    , margins.top // y coord
    , {
      'width': margins.width // max width of content on PDF
      , 'elementHandlers': specialElementHandlers
    },
    function (dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html

      
      pdf.save('Declaração.pdf');
    }
    )   
}