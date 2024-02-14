var tabla = document.querySelector("#tabla");

var dataTable = new DataTable(tabla, {
        perPage:3,
        perPageSelect:[3,6,9,12]
});