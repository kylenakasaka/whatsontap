<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>What's on Tap?</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
      "Whiskey",
      "Tequila",
      "Gin",
      "Rum",
      "Lime",
      "Salt",
      "Vodka",
      "Orange Juice",
      "Lemonade",
      "Ice",
        

    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#tags" )
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          terms.pop();
          terms.push( ui.item.value );
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  </script>
</head>
<body>
     <?php
        
            $dbhostname='localhost';
            $dbusername="kylenaka_user1";
            $dbpassword="power13";
            $dbingredient="kylenaka_Ingredients";
            $dbrecipe="kylenaka_Recipes";
            $dbdrink="kylenaka_Drinks";
            $ingredientconn = new mysqli($dbhostname, $dbusername, $dbpassword, $dbingredient);
            $recipeconn=new mysqli($dbhostname, $dbusername, $dbpassword, $dbrecipe);
            $drinkconn=new mysqli($dbhostname, $dbusername, $dbpassword, $dbdrink);
            
            if ($ingredientconn->connect_errno){
                echo "<p> MySQL Error".$ingredientconn->error;
            }
            else{
                echo'Database Connection Successful! ';
            }
            
            
          if ($recipeconn->connect_errno){
                echo "<p> MySQL Error".$recipeconn->error;
            }
            else{
                echo'Database Connection Successful! ';
            }
            if ($drinkconn->connect_errno){
                echo "<p> MySQL Error".$drinkconn->error;
            }
            else{
                echo'Database Connection Successful! ';
            }
            

               
            
        ?>
<div class="ui-widget">
  <label for="tags">What ingredients do you have? </label>
  <input id="tags" size="50">
</div>
 
 
</body>
</html>
