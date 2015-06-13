$(function() {
    var filesForm = {

        globals: {
            $page: $("#files .file-upload"),
            $feedbackLabel: $("label", this.$page),
            $fileInput: $("input[type=file]", this.$page)
        },

        init: function() {

            if( ! this.globals.$page.length)
                return;

            this.setupFileUpload();

        },

        setupFileUpload: function() {
            this.globals.$fileInput.change($.proxy(function() {
                this.globals.$feedbackLabel.text('Yep, got it!').addClass('has-file');
            }, this));
        }
    }

    filesForm.init();
});
