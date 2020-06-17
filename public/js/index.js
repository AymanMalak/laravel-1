$(document).ready( function () {



    $('#table_id').DataTable({
        columns: [
            { title: "Name" },
            { title: "Description" },
            { title: "Status" },
            { title: "Deadline" },
            { title: "Assigned to" },
            { title: "Accessability" }
        ],
        paging: true,
        // scrollY: 400,
        // "serverSide": true,
        // "ajax": "xhr.php"
        "search": {},
        "lengthMenu":  [ [ 2, 5 ,10, 25, 50, 75, 100,-1  ], [ 2, 5 ,10, 25, 50, 75, 100 ,"All"] ]
    });
});
