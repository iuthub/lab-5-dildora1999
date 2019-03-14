<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <title>Buy Your Way to a Better Education!</title>
        <link href="buyagrade.css" type="text/css" rel="stylesheet" />
    </head>
    
    <body>

       <?php
        if(($_REQUEST["name"] == "") || ($_REQUEST["section"] == "")||
            ($_REQUEST["cardtype"] == "")||($_REQUEST["cardnumber"] == "")){ ?>
                <h1>Sorry</h1>
        <p>You didn't fill out the form completely. <a href="buyagrade.html"> Try again?</a></p>

        <?php 
            }else{
            $name = $_REQUEST["name"]; 
            $section = $_REQUEST["section"];
            $typeCard = $_REQUEST["cardtype"];
            $numberCard = $_REQUEST["cardnumber"];
            $newtext = $name.";".$section.";".$numberCard.";".$typeCard;
            file_put_contents("suckers.txt", "\r\n".$newtext,FILE_APPEND);
            ?>

        <h2>Thanks, sucker!</h2>
        
        <p>
            Your information has been recorded.
        </p>

        <dl>
            <dt>Name</dt>
            <dd>
                <?php
                    print $name;
                ?>
            </dd>
                
            <dt>Section</dt>
            <dd>
                <?php
                    print $section;
                ?>
            </dd>

            <dt>Credit Card</dt>
            <dd>
                <?php
                    printf("%s (%s)", $cardnumber, $cardtype);
                ?>
            </dd>
        </dl>

        <div>
            <p>Here are all the suckers who have submitted here:</p>
            <pre><?php print file_get_contents("suckers.txt")?></pre>
        </div>

        <?php
            }
        ?>
        
    </body>
</html>