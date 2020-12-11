$(document).ready(function() {
    $('#tableData').DataTable( {
        "ajax": 'category1.php?fetchCategory=1'
    
    } );
});