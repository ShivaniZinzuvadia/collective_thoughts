$(function() {
    var spinner = $('.fa-spin');
    var alertSuccess = $('.alert-success');
    var alertError = $('alert-danger');
    var thought_form = $('#thought-form');

    $(document).on("click", "#btn-add-new", function() {
        $("#thought-form").trigger("reset");
        //Update modal title
        $('.modal-title').text('Add New Thought');

        $("#add-modal").modal({
            backdrop: "static",
            keyboard: false
        });
    });

    $(document).on("click", ".delete-thought", function(e){
        var currentNode = $(this).closest('.col-4');
        var thoughtId = $(this).parent().data('thought-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax("thoughts/" + thoughtId, {
            dataType: "json",
            method: "DELETE",
            success: function(result) {
                if(result){
                    currentNode.remove();
                    showAlert("success", "Thought deleted successfully!");
                } else {
                    showAlert("error", "Problem in deleting Thought! Please try after sometime.");
                }
            },
            error: function(err) {
                console.log(err);
                showAlert("error", "Problem in deleting Thought! Please try after sometime.");
            }
        });
    });

    $(document).on("click", ".edit-thought", function(e){
        var thoughtId = $(this).parent().data('thought-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax("thoughts/" + thoughtId, {
            dataType: "json",
            method: "GET",
            success: function(response) {
                // Set values in modal form
                thought_form.find('.thought_id').val(response.id);
                thought_form.find('.title').val(response.title);
                thought_form.find('.thought').val(response.thought);
                thought_form.find('.said_by').val(response.said_by);

                //Update modal title
                $('.modal-title').text('Update Thought');

                // Open modal
                $("#add-modal").modal({
                    backdrop: "static",
                    keyboard: false
                });
            },
            error: function(err) {
                console.log(err);
                showAlert("error", "Problem in fetching Thought! Please try after sometime.");
            }
        });
    })

    $(document).on("submit", "#thought-form", function(e) {
        e.preventDefault();
        addSpinner();
        var formData = $(this).serialize();
        var formDataArray = $(this).serializeArray();
        var thought_id = $(this).find('.thought_id').val();
        var url = "";
        var mode = "add";

        if(thought_id){
            url = "thoughts/" + thought_id;
            mode = "edit";
        } else {
            url = "thoughts";
        }
        $.ajax(url, {
            dataType: "json",
            method: "POST",
            data: formData,
            success: function(response) {
                if(mode === "add"){
                    if (response.result) {
                        var node = createNewNode(formDataArray, response.id);
                        $("#thoughts-list").prepend(node);
                        showAlert("success", "New Thought added successfully!");
                    } else {
                        showAlert("error","Problem in adding new Thought! Please try after sometime.");
                    }
                } else {
                    if (response.result) {
                        var node = createNewNode(formDataArray, thought_id);
                        $('.thought-'+thought_id).replaceWith(node);
                        showAlert("success", "Thought edited successfully!");
                    } else {
                        showAlert("error", "Problem in updating Thought! Please try after sometime.");
                    }
                }
                removeSpinner();
                $("#add-modal").modal("toggle");
            },
            error: function(err) {
                console.log(err);
                removeSpinner();
                showAlert("error", "Problem in adding new Thought! Please try after sometime.");
            }
        });
    });

    var addSpinner = function(){
        if(spinner.hasClass('d-none')){
            spinner.removeClass('d-none');
        }
    }

    var removeSpinner = function(){
        if(!spinner.hasClass('d-none')){
            spinner.addClass('d-none');
        }
    }

    var showAlert = function(type, message) {
        if (type === "success") {
            alertSuccess.find('.message').text(message);
            alertSuccess.removeClass("d-none");
            setTimeout(() => {
                alertSuccess.addClass("d-none");
            }, 5000);
        } else {
            alertError.find(".message").text(message);
            alertError.removeClass("d-none");
            setTimeout(() => {
                alertError.addClass("d-none");
            }, 5000);
        }
    };

    var createNewNode = function(inputData, thoughtId) {
        var template = `<div class="col-4 thought-%id%">
                            <div class="card thought-card border-light m-3 shadow rounded">
                                <div class="card-body">
                                    <div class="pull-right"  data-thought-id="%id%">
                                        <a href="javascript:void(0)" class="edit-thought" title="Edit">
                                            <i class="fa fa-edit fa-lg text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="delete-thought" title="Delete">
                                            <i class="fa fa-trash fa-lg text-danger" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <h4 class="card-title">%title%</h4>
                                    <p class="card-text">%thought%</p>
                                </div>
                                <div class="card-footer text-right">- %said_by%</div>
                            </div>
                        </div>`;
        $.each(inputData, function(i, field) {
            template = template.replace(`%${field.name}%`, field.value);
        });
        template = template.replace(new RegExp('%id%', 'g'), thoughtId);
        return template;
    };
});
