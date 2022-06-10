@extends('layouts.app')

@section('content')

    <form action="">
        <select name="customers" onchange="showCustomer(this.value)">
            <option value="">Tag</option>
            <option value="ALFKI">To do</option>
            <option value="NORTS ">School</option>
            <option value="WOLZA">Ideas</option>
        </select>
    </form>
    <br>
    <div id="txtHint"></div>

    <script>
        function showCustomer(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
            xhttp.open("GET", "getcustomer.php?q="+str);
            xhttp.send();
        }
    </script>

@endsection
