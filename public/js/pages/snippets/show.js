$(function(){
    var snippetShow = {

        globals: {
            $page: $('#snippets.show'),
            theEditor: null
        },

        init: function(){

            if( ! this.globals.$page.length)
                return;

            this.setupEditor();
        },

        /**
         * Setup the code editor itself
         */
        setupEditor: function() {
            this.globals.theEditor = document.getElementById('the-editor');

            if(! this.globals.theEditor)
                return;

            var modeType = this.globals.theEditor.getAttribute('data-id');

            this.globals.theEditor = CodeMirror.fromTextArea(document.getElementById('the-editor'), {
                theme: "medi-code",
                lineNumbers: true,
                mode: (modeType.length) ? modeType : 'markdown'
            });
        }
    }

    snippetShow.init();

});

