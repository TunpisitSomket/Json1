<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <button id="backpull"> back </button>

    <div id="Core">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody id="ttag">
            </tbody>
        </table>
    </div>


    <div id="plot">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody id="tblDetails">
            </tbody>
        </table>
    </div>


</body>


<script>

    function refresh() {}
    function showDetails(id) {
        $("#Core").hide();
        $("#plot").show();
        var url = "https://jsonplaceholder.typicode.com/posts/" + id

        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='Detailtab'";
                    line += "><td>" + data.id + "</td>"
                    line += "<td><b>" + data.title + "</b><br/>"
                    line += data.body + "</td>"
                    line += "<td>" + data.userId + "</td>"
                    line += "</tr>";
                    $("#tblDetails").append(line);
            })
            .fail((xhr, err, status) => {

            })
    }

    function LoadPosts() {
        var url = "https://jsonplaceholder.typicode.com/posts"
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>"
                    line += "<td><b>" + item.title + "</b><br/>"
                    line += item.body + "</td>"
                    line += "<td><button onClick='showDetails(" + item.id + ");'>Link</button></td>"
                    line += "</tr>";
                    $("#ttag").append(line);
                });
                $("#Core").show();
            })
            .fail((xhr, err, status) => {
            })
        }

    $(() => {
        LoadPosts();
        $("#plot").hide();
            $("#backpull").click(() => {
                $("#Core").show();
                $("#plot").hide();
                $("#Detailtab").remove();
            });
    })
</script>
</html>
