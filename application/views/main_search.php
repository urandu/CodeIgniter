<!DOCTYPE html>

<head>


    <link href="public/easy-autocomplete.themes.min.css" rel="stylesheet">
    <link href="public/easy-autocomplete.css" rel="stylesheet">



</head>



<body >



<form role="form" method="post" action="#">
    <div class="form-group ">
        <input  type="text" id="autocomp"  class="form-control input-lg " name="search" placeholder="Type your question here...">



        <button type="submit"  class="btn btn-success btn-lg">SEARCH</button>
    </div>
</form>


</body>


</html>



<script src="public/jquery-3.1.1.min.js"></script>

<script src="public/jquery.easy-autocomplete.js"></script>


<script type="application/javascript">


    /* var options = {
     url: function(phrase) {
     return "http://localhost/piladi_exams/piladi_expert/autocomplete?phrase=" + phrase + "&format=json";
     },
     getValue: "name"
     };
     $("#autocomp").easyAutocomplete(options);
     */

    var options = {

        url: function(phrase) {
            return "http://localhost/elastic-search/index.php/pages/search_pages"
        },

        getValue: function(element) {
            if(element.title.valueOf()!==null)
            {
                //alert("dfdff");
                return element.title;
            }
            else
            {

                return " ";
            }

        },

        ajaxSettings: {
            dataType: "json",
            method: "POST",
            data: {
                dataType: "json"
            }
        },

        preparePostData: function(data) {
            data.phrase = $("#autocomp").val();
            return data;
        },

        requestDelay: 400,

        theme: "square"
    };

    $("#autocomp").easyAutocomplete(options);



</script>