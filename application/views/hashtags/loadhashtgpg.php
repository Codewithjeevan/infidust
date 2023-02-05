<h5>Add Hash Tags</h5><br>
<div class="respopad40 " style="position:relative;padding-bottom:15px;padding-left:0 ">
    <form id="posthashform" method="POST">
        <i class="fa fa-hashtag srch-icon" aria-hidden="true"></i>
        <div class="srch-loader" style="z-index:99;display:none">
            <div class="sbl-circ-path3"></div>
        </div>
        <input type="text" id="srchhashtags" class="cus-srch-input d-inline" style="width:90%;" name="hashtag" placeholder="Hash Tag Data..">
        <i class="fa fa-plus hshadd" style="cursor:pointer;font-size: 19px;"  aria-hidden="true"></i>
        <span id="shosearchhash" class="bg-light" style="z-index: 99;position: absolute;width: 90%;display: block;">

        </span>
        <input type="hidden" id="txtval" name="hashname" value="">
        <input type="hidden" name="byid" value="<?php echo $byid; ?>">
        <input type="hidden" name="hshtyp" value="<?php if ($hshtyp == 1) {
            echo 'testpaper';
        } else if ($hshtyp == 2) {
            echo 'subject';
        } elseif ($hshtyp == 3) {
            echo 'course';
        } elseif ($hshtyp == 4) {
            echo 'material';
        }
        ?>">
        <input type="hidden" id="pepid" name="pepid" value="<?php if ($hshtyp == 1) {
            echo @$pepid;
        }elseif ($hshtyp == 4) {
            echo @$pepid;
        } ?>">
        <div id="apphsh" class="d-none "></div>
    </form>
</div>
<div style="width: 100%;" id="shohashtags" class="hshname">

</div>
<input type="button" class="btn btn-primary btn-raised mt-1 savehash" value="Add Hash">


<script>
    $(document).ready(function(e) {
        var hshtyp = '<?php echo $hshtyp; ?>';
        var byid = '<?php echo $byid; ?>';
        var pepid = "<?php if ($hshtyp == 1) { echo @$pepid; }elseif ($hshtyp == 4) {  echo @$pepid;  } else{
            echo 0;
        }?>";
        console.log(hshtyp);
        $('#shohashtags').load('<?php echo base_url(); ?>hashtag/showhashtags/' + byid +'/'+ hshtyp + '/' + pepid);
    });


    $("#shosearchhash").show();
    $('.hshadd').click(function(e) {
        
        $('.rmhshn').hide();
        var hshval = $('#srchhashtags').val();
        var hsh = "";
        var ids = (new Date().getTime()).toString(36)

        var txt = $('#search-criteria').val();
        var hshname = document.getElementById('shohashtags');

        if (!hshval) {
            $('#alert-msg').html("Please Add Text!");
            $('#alert-toast').show().delay(2000).slideUp();
        } else if (hshname.textContent.includes(hshval)) {
            $('#alert-msg').html("#Tag Already Exists");
            $('#alert-toast').show().delay(2000).slideUp();
        } else {

            $('#apphsh').append(`<input type="" id='rm` + ids + `' class="apphsh" name="apphshval" value="` + hshval + `,">`);
            $('#shohashtags').append(`<span style='font-size: 12px; padding:1px' id='rm` + ids + `' class='btn btn-outline-secondary'>
            <i class='fa fa-hashtag ' aria-hidden='true' ></i>
            <p class='pr-1 d-inline'>` + hshval + `</p>
            <i class='fa fa-times p-1 text-dark' style='cursor:pointer; font-size: 15px; ' onclick=clcid('` + (ids) + `') aria-hidden='true'></i>
        </span> `);
            $('#srchhashtags').val('');
        }
    });

    function clcid(ids) {
        $('#rm' + ids + '').remove();
        setTimeout(function() {
            $('#rm' + ids + '').remove();
        }, 1);
    }

    $('.savehash').click(function(e) {
        var cnt = '';
        $("[name='apphshval']").each(function() {
            cnt += this.value;
        });
        var hshv = $("#txtval").val(cnt);
        if (!hshv) {
            $('#alert-msg').html("Enter mandatory fields !");
            $('#alert-toast').show().delay(2000).slideUp();
        } else {
            var med = $(this);
            e.preventDefault();
            if (med.data('requestRunning')) {
                return;
            }
            med.data('requestRunning', true);
            $('#alert-wait').show();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>hashtag/hshsave',
                data: $("#posthashform").serialize(),
                success: function(msg) {
                    $('#alert-wait').delay().slideUp();
                    $('#alert-suc').delay(2000).show().slideUp();
                },
                error: function(data) {
                    console.log("error");
                    console.log(data);
                    $('#alert-wait').delay().slideUp();
                    $('#alert-err').delay(2000).show().slideUp();
                },
                complete: function() {
                    med.data('requestRunning', false);
                }
            });
        }
    });

    /// search hash tag
    var typingTimer; //timer identifier
    var doneTypingInterval = 1000; //time in ms, 5 second for example
    var $input = $('#srchhashtags');

    $input.on('keyup', function() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingnm, doneTypingInterval);
        // $(".srch-loader").show();
        // $("#srch-closee").show();
    });
    //on keydown, clear the countdown 
    $input.on('keydown', function() {
        clearTimeout(typingTimer);

    });

    //user is "finished typing," do something  srch-loader
    function doneTypingnm() {
        var hshtyp = '<?php echo $hshtyp; ?>';
        console.log(hshtyp);
        var searchval = $("#srchhashtags").val();
        if (searchval) {
            $("#shosearchhash").show(); 
            $("#shosearchhash").load('<?php echo base_url() . "hashtag/srchhash/"; ?>' + hshtyp + '/'  + searchval );
        } else {
            $("#shosearchhash").hide();
        }
    }
</script>