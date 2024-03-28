<script>
    $(document).ready(function() {
        // define columns for the datatables
        columns = window.LaravelDataTables["employeeTable"].columns();
        toggleColumnsDatatable(columns);
    });

    function searchColumsDataTable(datatable) {
        datatable.api().columns([1, 2, 3, 4, 5, 6, 7]).every(function() {
            var column = this;
            var input = document.createElement("input");
            if (column.selector.cols == 7) {
                input.setAttribute('type', 'date');
            }
            input.setAttribute('placeholder', 'Nhập từ khóa');
            input.setAttribute('class', 'form-control');

            // Get footer of the column
            var footer = $(column.footer());
            if (footer.length > 0) {
                // If footer exists, append the input to it
                $(input).appendTo(footer.empty())
                    .on('change', function() {
                        column.search($(this).val(), false, false, true).draw();
                    });
            } else {
                console.error("Footer not found for column " + column.selector.cols);
            }
        });
    }
</script>
