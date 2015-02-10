$(function(){
    $theEditor = $("#the-editor");

    if(! $theEditor.length)
        return;

    var $theEditor = CodeMirror.fromTextArea(document.getElementById('the-editor'), {
        theme: "medi-code",
        lineNumbers: true,
        mode: 'xml'
    });


});
