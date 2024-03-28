<script>
    function searchColumsDataTable(datatable) {
        datatable.api().columns([1, 2, 3, 4, 5, 6, 7, 8, 9]).every(function() {
            var column = this;
            var input = document.createElement("input");
            if (column.selector.cols == 8) {
                input.setAttribute('type', 'date');
            }

            input.setAttribute('placeholder', 'Nhập từ khóa');
            input.setAttribute('class', 'form-control');

            $(input).appendTo($(column.footer()).empty())
                .on('change', function() {
                    column.search($(this).val(), false, false, true).draw();
                });
        });
        $(document).ready(function() {
            // define columns for the datatables
            columns = window.LaravelDataTables["postTable"].columns();
            toggleColumnsDatatable(columns);
        });
    }
</script>
