<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div style= "margin-right: 75%;">
            <fieldset class="fieldset">
                <legend><h1 style="border-style: ridge; padding: 5px;">Driver Inspections</h1></legend>
                <form action="Inspections.php" method="get" >
                    <table>
                        <tr>
                            <td>Date:</td>
                            <td><input type="date" name="date"></td>
                        </tr>
                        <tr>
                            <td>Type:</td>
                            <td><input type="checkbox" id="pre" name="pre" value="pre" checked><label for="pre">Pre</label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="checkbox" id="post" name="post" value="post"><label for="post">Post</label></td>
                            </tr>
                        <tr>
                        <td><input type="submit"></td>
                        </tr>
                    </table>
                </form>
                <code>Code is located at C:\Users\Staff\Downloads\Xampp\htdocs\scripts\WorkingCode\ on ******</code>
            </fieldset>
        </div>
    </body>
</html>