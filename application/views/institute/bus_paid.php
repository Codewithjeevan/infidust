<div class="row">
    <div class="col-md-6 box-sdow card-data">
        <h3 class="my-2">Premium Setting</h3>
        <form id="postform" method="post" class="mt-3">
            
            <div class="form-check my-1 mx-1">
                <input class="form-check-input" type="checkbox" id="queschek" name="testchek" value="1" id="defaultCheck1" <?php
                      
                ?>>
                <label class="form-check-label" for="defaultCheck1">
                    Test Paper Sale
                </label>
            </div>
            <div class="form-check my-1 mx-1">
                <input type="hidden" name="bsid" value="<?= $bsid['psdata_id'] ?>">
                <input class="form-check-input" type="checkbox" id="testchek" name="testchek" value="2" id="defaultCheck1" >
                <label class="form-check-label" for="defaultCheck1">
                    Course Sale
                </label>
            </div>
            <div class="form-check my-1 mx-1">
                <input type="hidden" name="bsid" value="<?= $bsid['psdata_id'] ?>">
                <input class="form-check-input" type="checkbox" id="studymat" name="testchek" value="3" id="defaultCheck1" >
                <label class="form-check-label" for="defaultCheck1">
                    Study Material Sale
                </label>
            </div>
            <div class="form-check my-1 mx-1">
                <input type="hidden" name="bsid" value="<?= $bsid['psdata_id'] ?>">
                <input class="form-check-input" type="checkbox" id="study_test" name="testchek" value="4" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Study And Test Paper Sale
                </label>
            </div>
            <div class="form-check my-1 mx-1">
                <input type="hidden" name="bsid" value="<?= $bsid['psdata_id'] ?>">
                <input class="form-check-input" type="checkbox" id="ebook" name="testchek" value="5" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Ebook Sale
                </label>
            </div>
            <div>
                <input class="btn btn-primary btn-raised mt-3 subform" type="button" value="Submit"></input>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.subform').prop('disabled', true);
        $('#testchek').change(function(e) {
            if ($("#testchek").prop('checked') == true) {
                $('.subform').prop('disabled', false);
                $('#queschek').prop('checked', false);
                $('#studymat').prop('checked', false);
                $('#study_test').prop('checked', false);
                $('#ebook').prop('checked', false);
            } else {
                $('.subform').prop('disabled', true);
            }
        });
        $('#queschek').change(function(e) {
            if ($("#queschek").prop('checked') == true) {
                $('.subform').prop('disabled', false);
                $('#testchek').prop('checked', false);
                $('#studymat').prop('checked', false);
                $('#study_test').prop('checked', false);
                $('#ebook').prop('checked', false);
            } else {
                $('.subform').prop('disabled', true);
            }
        });
        $('#studymat').change(function(e) {
            if ($("#studymat").prop('checked') == true) {
                $('.subform').prop('disabled', false);
                $('#testchek').prop('checked', false);
                $('#queschek').prop('checked', false);
                $('#study_test').prop('checked', false);
                $('#ebook').prop('checked', false);
            } else {
                $('.subform').prop('disabled', true);
            }
        });
        $('#study_test').change(function(e) {
            if ($("#study_test").prop('checked') == true) {
                $('.subform').prop('disabled', false);
                $('#testchek').prop('checked', false);
                $('#queschek').prop('checked', false);
                $('#studymat').prop('checked', false);
                $('#ebook').prop('checked', false);
            } else {
                $('.subform').prop('disabled', true);
            }
        });
        $('#ebook').change(function(e) {
            if ($("#ebook").prop('checked') == true) {
                $('.subform').prop('disabled', false);
                $('#testchek').prop('checked', false);
                $('#queschek').prop('checked', false);
                $('#studymat').prop('checked', false);
                $('#study_test').prop('checked', false);
            } else {
                $('.subform').prop('disabled', true);
            }
        });
    });
    $('.subform').click(function(e) {
        var statedata = $('#statedata').val();

        var med = $(this);
        e.preventDefault();
        if (med.data('requestRunning')) {
            return;
        }
        med.data('requestRunning', true);
        // var formData = new FormData($('#postfeed')[0]);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>dashboard/post_bus_pre',
            dataType: 'json',
            data: new FormData($('#postform')[0]),
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 200) {
                    $('#alert-wait').delay().slideUp();
                    $('#alert-suc').delay(2000).show().slideUp();
                } else {
                    $('#alert-wait').delay().slideUp();
                    $('#alert-err').delay(2000).show().slideUp();
                }
            },
            error: function(response) {
                console.log("error");
                // console.log(data);
                $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            },
            complete: function() {
                med.data('requestRunning', false);
            }
        });
    });
</script>