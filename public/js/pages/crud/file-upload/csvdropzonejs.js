"use strict";
// Class definition

var KTDropzoneDemo = function () {
    // Private functions
    var demo1 = function () {

        // file type validation
        $('#kt_dropzone_3').dropzone({

            url: route('admin.test.store-csv'), // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: max_files,
            init: function() {
                this.on("maxfilesexceeded", function(file) {
                      this.removeAllFiles();
                      this.addFile(file);
                });
          },
            maxFilesize: max_file_size, // MB
            addRemoveLinks: true,
            acceptedFiles: accepted_files,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            accept: function(file, done) {

                let preview_link = route('admin.test.preview.csv', file.name)

                $('#priview-csv').html('').append('<a href="' + preview_link + '"  target="_blank" class="btn btn-primary mr-2">'+ preview +'</a>')

                $('#csv_file_name').val(file.name);

                done();
            }
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
        }
    };
}();

KTUtil.ready(function() {
    KTDropzoneDemo.init();
});
