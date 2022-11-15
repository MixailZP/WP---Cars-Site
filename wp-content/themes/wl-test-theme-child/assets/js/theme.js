jQuery(document).ready(function($){
    'use strict';
    
    let inputAddphoto = '<div class="upload-photo">Фотография</div>',
    inputphoto = $('#id_photo');
    inputphoto.before(inputAddphoto);

        $('.upload-photo').on('click', function() {
        $(this).siblings('#id_photo').trigger('click');
        });

        inputphoto.on('change', function(){
        var input = $(this),
        reader = new FileReader();

reader.onload = function (e) {
    input.siblings('.upload-photo').css('background-image', 'url(' + e.target.result + ')');
};

reader.readAsDataURL(this.files[0]);
});

// // add phone or delete phone input
// function add(){
//     let new_chq_no = parseInt($('#total_chq').val())+1;
//     let new_input="<input type='text' id='new_"+new_chq_no+"'>";
//     $('#new_chq').append(new_input);
//     $('#total_chq').val(new_chq_no)
//   }
//   function remove(){
//     let last_chq_no = $('#total_chq').val();
//     if(last_chq_no>1){
//       $('#new_'+last_chq_no).remove();
//       $('#total_chq').val(last_chq_no-1);
//     }
//   }

});