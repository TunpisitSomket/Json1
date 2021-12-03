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

    <table id="tblData">
        <thead>
            <tr>
                <th>
                    <input type="text" id="price" placeholder="ราคา">
                </th>
                <th>
                    <button id="btnAdd"> Add </button>
                </th>
                <th>
                    <button id="btnReset" onclick="location.reload();"> Reset </button>
                </th>
                <th>
                    <button id="btnSum"> SUM </button>
                </th>
            </tr>
            <tr>
                <th> Price </th>
                <th> +vat7% </th>
                <th> vat </th>
                <th> asdasd</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            </tr>
        </tbody>
    </table>
</body>

<script>
    var i = 0;

    function btnDel_click(i) {
        $("#row_" + i).remove();
    }

    function float2int(value) {
        return value | 0;
    }

    function sum(i){
        
    }

    $(() => {
        $("#btnAdd").click(() => {
            var defaultPrice = 0;
            var price = $("#price").val();
            var Sprice = (price * 100) / 107;
            var defaultPrice = (Sprice * 100) / 107;
            var vat = price - float2int(Sprice);
            var line = "<tr id='row_" + i + "'>";
            line += "<td id='td_Value'>" + price + "</td>";
            line += "<td>" + float2int(Sprice) + "</td>";
            line += "<td>" + vat + "</td>";
            line += "<td><button onclick='btnDel_click(" + i + ");'> del </button></td>";
            line += "</tr>";
            console.log(line);
            $("#tblData").append(line);
            i += 1;
            $("#price").val("");
            $("#price").focus();
        });

        $("#btnSum").click(() => {
            var value = $("td_Value").val();
            console.log(value);
        });

    });

</script>

</html>
