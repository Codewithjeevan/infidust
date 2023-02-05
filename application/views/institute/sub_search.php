<table style="width: 100%;">
    <?php foreach ($subsearch as $value) { ?>
        <tr class="border-top btn d-block" onclick="insearch('<?php echo $value['sub_name'] ?>')" style="cursor: pointer;">
        <td class=""><?php echo $value['sub_name'] ?></td>
        </tr>
    <?php } ?>
</table>
<script>
    
    function insearch(e) { 
        $('#entersub').val(e);
        $('#subsearch').hide();
     }
</script>