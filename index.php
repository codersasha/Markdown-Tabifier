<html>
    <head>
        <title>Markdown File Template</title>

        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/jquery-ui-1.8.18.custom.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>

            $(function() {
                // set the tag to use
                var header_tags = ["h1", "h2", "h3", "h4"];
                
                for (h in header_tags) {
                    var header_tag = header_tags[h];
                
                    // find where the start of this tag is
                    to_attach = $(header_tag).first().prev();
                    to_attach_parent = $(header_tag).first().parent();

                    // build the tabs
                    tab_main = $("<div class='tabs'>");
                    tab_main.css("margin", "10px");

                    // attach headers as tabs
                    tab_headers = $("<ul>");
                    tab_main.append(tab_headers);
                    $(header_tag).each(function(i, e) {
                        tab_headers.append("<li><a href='#tabs-" + i + "'>" + $(e).text() + "</a></li>");
                    })

                    // add pages
                    $(header_tag).each(function(i, e) {
                        var new_tab = $("<div id='tabs-" + i + "' />");
                        $(this).nextUntil(header_tag).each(function(i, e) {
                            new_tab.append($(e));
                        });
                        tab_main.append(new_tab);
                    })

                    // get rid of the old stuff
                    $(header_tag).nextUntil(header_tag).detach();
                    $(header_tag).detach();

                    // save
                    if (to_attach.length == 0) {
                        // first child of its parent
                        to_attach_parent.prepend(tab_main);
                    } else {
                        to_attach.after(tab_main);
                    }
                    $(".tabs").tabs();
                }
                
            });

        </script>

        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="development-bundle/themes/base/jquery.ui.all.css" />
    </head>
    <body>

        <?php
        include("markdown_file.html");
        ?>

    </body>
</html>
