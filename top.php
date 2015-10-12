<?php
  require "config.php";
  require "layout.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <?php res() ?>
    <!--
       Meta tags
    -->
    <!-- Extensions (Required) -->
    <link href="candystrap/css/extensions.min.css" rel="stylesheet">
  </head>
  <body>
    <input id="typeahead-example"class="form-control" type="text" placeholder="Enter popular Indian city name">
    <!--
       jQuery & other libraries
    -->
    <!-- Typeahead.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      (function($) {
        var cities, datums;
        datums = function(cities) {
          return function(query, callback) {
            var matches, regex;
            matches = [];
            regex = new RegExp(query, 'i');
            $.each(cities, function(i, city) {
              if (regex.test(city)) {
                return matches.push({
                  value: city
                });
              }
            });
            return callback(matches);
          };
        };
        cities = ["Chennai", "Dehradun", "Delhi", "Bombay", "Kolkata", "Lucknow", "Mirzapur", "Varanasi"];
        $("#typeahead-example").typeahead({
          highlight: true,
          hint: true,
          minLength: 1
        }, {
          displayKey: "value",
          name: "cities",
          source: datums(cities)
        });
      })(jQuery);
    </script>
  </body>
<html>