tinymce.init({selector:'textarea'});
alert('hello');

$('#selectAllBoxes').click(function () {    
     $('input:checkbox').prop('checked', this.checked);    
 });
// alert('hello');
 ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
