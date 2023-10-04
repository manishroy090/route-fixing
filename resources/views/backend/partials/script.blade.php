jQuery
<script src="{{asset('adminlte/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
{{-- font awesome --}}
<script src="{{asset('adminlte/js/fontawesome.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- ckeditor --}}
<script type="text/javascript" src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('adminlte/js/jquery-confirm.min.js')}}"></script>
<script src="{{asset('adminlte/lightbox2/src/js/lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('adminlte/js/print.min.js') }}"></script>
<script type="text/javascript">
  (function($) {
    var baseUrl = "{{ url('/') }}";

    if ($('.slug_source').length > 0) {
      $('.slug_source').on('keyup change', function() {
        var text = $(this).val();
        text = text.toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
        $('.slug_field').val(text);
      });
    }

    if ($('.slug_field').length > 0) {
      $('.slug_field').on('keyup change', function() {
        var text = $(this).val();
        text = text.toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
        $('.slug_field').val(text);
      });
    }

    if ($('.add-more-attachment').length > 0) {
      $('.add-more-attachment').click(function() {
        var file_input_count = $('.attachment-input').length;
        var next_input_count = parseInt(file_input_count) + parseInt(1);
        $("<div><div class='remove-attachments' id='remove-attachments-" + next_input_count + "'><a data-count='" + next_input_count + "' class='remove-attachment' href='javascript:;'>Remove</a></div></div><input type='file' class='form-control attachment-input mt-2' id='attachments-" + next_input_count + "' name='attachments[" + next_input_count + "]' />").insertAfter("#attachments-" + file_input_count);
      });
    }

    $(document).on('click', '.remove-attachment', function() {
      var file_input_count = $(this).attr('data-count');
      $('#attachments-' + file_input_count).remove();
      $('#remove-attachments-' + file_input_count).remove();
      $('#attachments-' + file_input_count + "_error").remove();
    });

    $(document).on("change", ".file_video_upload", function(evt) {
      $('#banner_image_video')[0].src = URL.createObjectURL(this.files[0]);
      $('#banner_image_video').parent()[0].load();
    });


    if ($('.editor').length > 0) {
      $('.editor').each(function(e) {
        CKEDITOR.replace(this.id, {
          filebrowserUploadUrl: "upload_route",
          filebrowserUploadMethod: 'form',
          filebrowserBrowseUrl: "getUploadedFiles",
        });
      });
    }

    if ($('.basic_editor').length > 0) {
      $('.basic_editor').each(function(e) {
        CKEDITOR.replace(this.id, {
          filebrowserUploadUrl: "upload",
          filebrowserUploadMethod: 'form',
          filebrowserBrowseUrl: "getUploadedFiles",
          format_tags: 'p;h1;h2;h3;h4;h5;h6;pre',
          toolbarGroups: [{
              "name": "basicstyles",
              "groups": ["basicstyles"]
            },
            {
              "name": "links",
              "groups": ["links"]
            },
            {
              "name": "document",
              "groups": ["mode"]
            },
            {
              "name": "styles",
              "groups": ["styles"]
            },
            {
              "name": "insert",
              "groups": ["insert"]
            },
          ],
          removeButtons: 'Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
        });
      });
    }


    if ($('.reply_ticket').length > 0) {
      $('.reply_ticket').click(function(e) {
        e.preventDefault();
        var formaction = $('#reply-form').attr('action');
        var formData = new FormData(document.getElementById("reply-form"));
        formData.set("message", CKEDITOR.instances["message"].getData());
        var btn_label = $(this).text();
        $.ajax({
          url: formaction,
          type: 'POST',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function() {
            $('.reply_ticket').html("<i class='fas fa-spinner fa-pulse fa-1x'></i> " + btn_label).prop("disabled", false);
          },
          success: function(response) {
            if (response) {
              if (response.success) {
                showMessageHtml(response.success, "success");
              } else {
                showMessageHtml(response.error, "error");
              }
              $('.reply_ticket').html(btn_label).prop("disabled", false);
              $('#reply-form')[0].reset();
              $('.error-message').remove();
              $('.attachment-input').not(':first').remove();
              $('.remove-attachments').remove();
              CKEDITOR.instances["message"].setData('');
            }
          },
          error: function(response) {
            if (typeof response.responseJSON.errors !== '' && response.responseJSON
              .errors) {
              $(".error-message").remove();
              $.each(response.responseJSON.errors, function(key, value) {
                key = key.replace("attachments.", "attachments-");
                var dy_class = key + "_error";
                if ($('.' + dy_class).length == 0) {
                  if (key == 'message') {
                    $("#cke_" + key).after("<div class='" + dy_class + " error error-message'>" + value + "</div>");
                  } else {
                    $("#" + key).after("<div class='" + dy_class + " error error-message'>" + value + "</div>");
                  }

                }
              });
            }
            $('.reply_ticket').html(btn_label).prop("disabled", false);
          }
        }).fail(function(response) {
          $('.reply_ticket').html(btn_label).prop("disabled", false);
        });
      });
    }

    $('.view_order').on('click', function(event) {
      event.preventDefault();
      var view_order_link = $(this).attr('href');
      $.get(view_order_link, function(data, status) {
        if (status == 'success') {
          $("#orderViewModal").modal("show");
          $(".orderModalBody").html(data.data.pdf_view);
          $('.print_order').data('orderid', data.data.order_id); //setter
        }
      });
    });

    $('body').on('change', '.update_order_status', function() {
      $.ajax({
        url: "backend.update-status",
        type: 'POST',
        data: {
          order: $(this).attr('data-orderid'),
          status: $(this).val()
        },
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        dataType: "json",
        beforeSend: function() {
          $("#loadingoverlay").fadeIn();
        },
        success: function(data) {
          if (data.status == "success") {
            $("#loadingoverlay").fadeOut();
            showMessage("success", data.message, true);

          } else {
            $("#loadingoverlay").fadeOut();
            showMessage("error", data.message, false);
          }
        },
        error: function(response) {
          $("#loadingoverlay").fadeOut();
          showMessage("Order status cannot be updated", "error", false);
        }
      }).fail(function(response) {
        $("#loadingoverlay").fadeOut();
        showMessage("Order status failed to update", "error", false);
      });
    });

  })(jQuery);
  @if(Session::has('success'))
  showMessage("success", "{{ session('success') }}", false);
  @endif

  @if(Session::has('error'))
  showMessage("error", "{{ session('error') }}", false);
  @endif

  @if(Session::has('info'))
  showMessage("info", "{{ session('info') }}", false);
  @endif

  @if(Session::has('warning'))
  showMessage("warning", "{{ session('warning') }}", false);
  @endif

  function showPreview(event, previewid, width, height) {
    var uploaded_file = event.target.files[0];
    if (uploaded_file != undefined) {
      formData = new FormData();
      if (!!uploaded_file.type.match(/image.*/)) {
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("image", uploaded_file);
        formData.append("width", width);
        formData.append("height", height);
        $.ajax({
          url: "{{ route('temp-upload') }}",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function() {
            $('#' + previewid).addClass('imageProcessing');
            // var imageurl = "{{route('frontend.home')}}/images/loader.gif";
            var imageurl = "{{asset('images/loader.gif')}}";
            $('#' + previewid).attr('src', imageurl);
          },
          success: function(data) {
            $('#' + previewid).attr('src', data.imageurl);
            var inputfield = previewid.replace('_preview', '');
            $('#' + inputfield).val(data.imagename);
            removeImageProcessingClass(previewid);
          },
          error: function(response) {
            showMessage("error", "Image cannot be uploaded", false);
            removeImageProcessingClass(previewid);
          }
        }).fail(function(response) {
          showMessage("error", "Image cannot be failed", false);
          removeImageProcessingClass(previewid);
        });
      } else {
        showMessage("error", "Image is invalid", false);
        removeImageProcessingClass(previewid);
      }
    } else {
      showMessage("error", "Select valid image", false);
      removeImageProcessingClass(previewid);
    }
  }

  function showPreviewMultiple(event, previewid, width, height) {
    var uploaded_file = event.target.files[0];
    if (uploaded_file != undefined) {
      formData = new FormData();
      if (!!uploaded_file.type.match(/image.*/)) {
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("image", uploaded_file);
        formData.append("width", width);
        formData.append("height", height);
        $.ajax({
          url: "{{route('temp-upload') }}",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function() {
            $('#' + previewid).addClass('imageProcessing');
            var imageurl = "{{ route('frontend.home') }}/images/loader.gif";
            $('#' + previewid).attr('src', imageurl);
          },
          success: function(data) {
            $('#' + previewid).attr('src', data.imageurl);
            var inputfield = previewid.replace('preview_', '');
            $('#' + inputfield).val(data.imagename);
            removeImageProcessingClass(previewid);
          },
          error: function(response) {
            showMessage("error", "Image cannot be uploaded", false);
            removeImageProcessingClass(previewid);
          }
        }).fail(function(response) {
          showMessage("error", "Image cannot be failed", false);
          removeImageProcessingClass(previewid);
        });
      } else {
        showMessage("error", "Image is invalid", false);
        removeImageProcessingClass(previewid);
      }
    } else {
      showMessage("error", "Select valid image", false);
      removeImageProcessingClass(previewid);
    }
  }

  function removeImageProcessingClass(previewid) {
    $('#' + previewid).removeClass('imageProcessing');
  }

  function showMessage(msg_type, msg_content, is_reload) {
    if (msg_content != '' && typeof msg_content != 'undefined') {
      if (msg_type == 'error') {
        toastr.error(msg_content, 'Error', {
          closeButton: true,
          positionClass: "toast-top-right",
          progressBar: true,
          onHidden: function() {
            if (is_reload == true) {
              window.location.reload();
            }
          }
        });
      } else if (msg_type == 'info') {
        toastr.info('', msg_content, {
          closeButton: true,
          positionClass: "toast-top-right",
          progressBar: true,
          timeOut: 10,
          extendedTimeOut: 10,
          onHidden: function() {
            if (is_reload == true) {
              window.location.reload();
            }
          }
        });
      } else if (msg_type == 'success') {
        toastr.success(msg_content, 'Success', {
          closeButton: true,
          positionClass: "toast-top-right",
          progressBar: true,
          onHidden: function() {
            if (is_reload == false) {
              window.location.reload();
            }
          }
        });
      }
    }
  }

  function showMessageHtml(msg_content, msg_type) {
    if (msg_content != '' && typeof msg_content != 'undefined') {

      if (msg_type == 'error') {
        $('.show_error_message').show().html(msg_content);
      } else if (msg_type == 'success') {
        $('.show_success_message').show().html(msg_content);
      }
    }
  }

  function processScanLimitForm(default_scan_limit, user) {
    $.confirm({
      title: false,
      content: '' +
        '<form action="" class="trailScanForm">' +
        '<div class="form-group">' +
        '<label>Trail Scan Limit</label>' +
        '<input type="text" placeholder="Number of Scans" class="num_scans form-control" required  value="' + default_scan_limit + '"/>' +
        '</div>' +
        '</form>',
      buttons: {
        formSubmit: {
          text: 'Submit',
          btnClass: 'btn-blue',
          action: function() {
            var scan_number = this.$content.find('.num_scans').val();
            var btn_label = "Submit";

            if (!scan_number) {
              $.alert("Trail Scan Limit is required");
              return false;
            } else if (!$.isNumeric(scan_number)) {
              $.alert("Trail Scan Limit should be number");
              return false;
            } else if (scan_number <= 1) {
              $.alert("Trail Scan Limit cannot be less than 1");
              return false;
            }

          }
        },
        cancel: function() {
          //close
        }
      }
    });
  }

  function setToDate(ev, object) {
    console.log(object.value);
    $('#to_date').attr({
      "min": object.value
    });
  }

  function setPaymentToDate(ev, object) {
    console.log(object.value);
    $('#to_date').attr({
      "min": object.value
    });
  }

  function setOrderToDate(ev, object) {
    console.log(object.value);
    $('#to_date').attr({
      "min": object.value
    });
  }

  function setMerchantOrderToDate(ev, object) {
    console.log(object.value);
    $('#to_date').attr({
      "min": object.value
    });
  }

  function setMerchantSubscriptionToDate(ev, object) {
    console.log(object.value);
    $('#to_date').attr({
      "min": object.value
    });
  }

  function closeOrderModal() {
    if ($('#orderViewModal').length > 0) {
      $('#orderViewModal').modal('hide');
    }
  }

  document.addEventListener("keydown", function(event) {
    const key = event.key; // Or const {key} = event; in ES6+
    if (key === "Escape") {
      closeOrderModal();
    }
  });


  function printOrder() {
    var print_data_url = "backend.print_order'";
    var btn_label = "Print";
    $.ajax({
      url: print_data_url,
      type: 'GET',
      data: {
        order_id: $('.print_order').data('orderid')
      },
      beforeSend: function() {
        $('.print_order').html("<i class='fas fa-spinner fa-pulse fa-1x'></i> " + btn_label).prop("disabled", true);
      },
      success: function(response) {
        $('.print_order').html(btn_label).prop("disabled", false);
        printJS({
          printable: response.data.path,
          type: 'pdf',
          showModal: true
        })
      },
      error(response) {
        $('.print_order').html(btn_label).prop("disabled", false);
      }
    }).fail(function(response) {
      $('.print_order').html(btn_label).prop("disabled", false);
    });
  }
</script>