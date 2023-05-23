<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <select name="slct1" id="slct1" onchange = "populate(this.id, 'slct2')" >
            <option value=""> -- choose option -- </option>
            <option value="india">INDIA</option>
            <option value="america">AMERICA</option>
        </select><br><br>

        <select name="slct2" id="slct2">
            <option value=""></option>
        </select>
    </form>


    <script>
        function populate(s1,s2)
        {
            var s1 = document.getElementById(s1);
            var s2 = document.getElementById(s2);

            s2.innerHTML = "";

            if(s1.value = "india")
            {
                var optionArray = ['delhi|Delhi', 'mumbai|Mumbai', 'bangalore|Bangalore'];
            }else if(s1.value = "america")
            {
                var optionArray = ['newyork|Newyork', 'washington|Washington', 'houston|Houston'];
            }

            for(var option in optionArray)
            {
                var pair = optionArray[option].split("|");
                var newoption = document.createElement("option");

                newoption.value = pair[0];
                newoption.innerHTML = pair[1];
                s2.options.add(newoption);
            }
        }
    </script>

</body>
</html>