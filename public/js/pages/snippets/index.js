$(function(){
    var snippetIndex = {

        globals: {
            $page: $('#snippets.create'),
            $snippetMode: $("input[name='mode']", this.$page),
            theEditor: null
        },

        init: function(){

            if( ! this.globals.$page.length)
                return;

            this.setupEditor();
            this.setupEditorModes();
        },

        /**
         * Setup the code editor itself
         */
        setupEditor: function() {
            this.globals.theEditor = document.getElementById('the-editor');

            if(! this.globals.theEditor)
                return;

            var modeType = this.globals.$snippetMode.val();

            this.globals.theEditor = CodeMirror.fromTextArea(document.getElementById('the-editor'), {
                theme: "medi-code",
                lineNumbers: true,
                mode: (modeType.length) ? modeType : 'markdown'
            });
        },

        /**
         * Setup the mode changers on button press
         */
        setupEditorModes: function() {
            var $modeChangers = $(".js-mode-changers", this.globals.$page);

            // I proxy so that /this/ remains in the correct scope
            $modeChangers.on('click', 'button', $.proxy(function(evt) {
                var $this = $(evt.currentTarget);
                var modeId = $this.data('id');

                $this.siblings().removeClass('active');
                $this.addClass('active');

                this.globals.$snippetMode.val(modeId);
                this.globals.theEditor.setOption('mode', modeId);

            }, this));
        }
    }

    snippetIndex.init();

});
