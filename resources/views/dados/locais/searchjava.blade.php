<script>
$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    $('#system-search').keyup( function() {
       var that = this;
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="7"><strong>A procurar por:"'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                tableRowsClass.eq(i).hide();
            }
            else
            {
            
            if(rowText == "Editar" || rowText == "Eliminar" || rowText == "Detalhes"){
                    tableRowsClass.eq(i).hide();
                }else{
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();}
                
            }
        });
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="7">Nada foi encontrado</td></tr>');
        }
    });
});

</script>