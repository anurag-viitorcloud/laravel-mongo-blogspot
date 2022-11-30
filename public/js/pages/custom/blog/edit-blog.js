"use strict";

var ghostEditor = {
    bindEvents: function() {
        this.bindDesignModeToggle();
        this.bindToolbarButtons();
    },

    bindDesignModeToggle: function() {
        $('#page-content').on('click', function(e) {
            document.designMode = 'on';
        });

        $('#page-content').on('click', function(e) {
        var $target = $(e.target);

        if ($target.is('#page-content')) {
            document.designMode = 'off';
        }
        });
    },

    bindToolbarButtons: function() {
        $('#toolbar').on('mousedown', '.icon', function(e) {
        e.preventDefault();
        var btnId = $(e.target).attr('id');
        this.editStyle(btnId);
        }.bind(this));
    },

    editStyle: function(btnId) {
        var value = null;

        if (btnId === 'createLink') {
        if (this.isSelection()) value = prompt('Enter a link:');
        }

        document.execCommand(btnId, true, value);
    },

    isSelection: function() {
        var selection = window.getSelection();
        return selection.anchorOffset !== selection.focusOffset
    },

    init: function() {
        this.bindEvents();
    },
}

ghostEditor.init();

$('.save').click(function() {
	var title = $('.title').html();
	var description = $('.description').html();
	var post = $('#post').html();
    var status = $(".status:checked").val();
	
	$.ajax({
        url: route('blogs.update-blog'),
        type: "POST",
        data: {
			'blog_id': blogId,
            'title': title,
			'description': description,
			'post': post,
            'status': status ?? 0
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            //Reloads the page
            $(document).ajaxStop(function(){
                window.location.reload();
            });
            if (data.success == true) {
                toastr.success(data.message); //Success message
            } else {
                toastr.error(data.message); //Error message
            }
        }
    })
});