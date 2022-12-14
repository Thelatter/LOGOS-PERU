<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>404 - Página no encontrada</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css" />
        <link href="https://necolas.github.io/normalize.css/4.1.1/normalize.css" rel="stylesheet" type="text/css" />
        <style>
            html {
                font-size: 62.5%; 
            }

            body {
                font-size: 1.5em;
                line-height: 1.6;
                font-weight: 400;
                font-family: "Raleway", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
                color: #222;
                background-color: rgba(33, 116, 134, 0.9);
                padding:3rem 0rem 7rem 0rem; 
            }

            h1, h2, h3, h4, h5, h6 {
                margin-top: 0;
                margin-bottom: 1rem;
                font-weight: 300; }
            h1 { font-size: 4.0rem; line-height: 1.2;  letter-spacing: -.1rem;}
            h2 { font-size: 3.6rem; line-height: 1.25; letter-spacing: -.1rem; }
            h3 { font-size: 3.0rem; line-height: 1.3;  letter-spacing: -.1rem; }
            h4 { font-size: 2.4rem; line-height: 1.35; letter-spacing: -.08rem; }
            h5 { font-size: 1.8rem; line-height: 1.5;  letter-spacing: -.05rem; }
            h6 { font-size: 1.5rem; line-height: 1.6;  letter-spacing: 0; }


            @media (min-width: 550px) {
                .container {
                    width: 80%; }
                h1 { font-size: 5.0rem; }
                h2 { font-size: 4.2rem; }
                h3 { font-size: 3.6rem; }
                h4 { font-size: 2.2rem; }
                h5 { font-size: 2.0rem; }
                h6 { font-size: 1.5rem; }	
            }


            button,
            .button {
                margin-bottom: 1rem; }
            input,
            textarea,
            select,
            fieldset {
                margin-bottom: 1.5rem; }
            pre,
            blockquote,
            dl,
            figure,
            table,
            p,
            ul,
            ol,
            form {
                margin-bottom: 2.5rem; }

            .container:after,
            .row:after
            {
                content: "";
                display: table;
                clear: both; }

            /* 404 Style */
            .row {
                position: fixed; 
                top: 50%; 
                left: 50%; 
                margin-top: -100px; 
                margin-left: -100px; }  

            .container {
                position: relative;
                width: 100%;
                max-width: 960px;
                margin: 0 auto;
                padding: 0 20px;
                box-sizing: border-box; }

            .title {
                color:#E6E9EA;
                text-align:center; }

            .sub-heading {
                font-size: 1.5rem;
                text-align:center;
                color: #FFFB81;
                margin: 10px 0; }

            hr.hr-style-404 {
                border: 0;
                height: 1px;
                width: 150px;
                background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 255, 0.65), rgba(0, 0, 0, 0)); }
            .redirect-style-404{
                color: #ffffff; 
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row">
            
             
                <h1 class="title">404</h1>
                <p class="sub-heading"> <?php echo $heading; ?></p>
                <hr class="hr-style-404"/>
                <span class="redirect-style-404"><?php echo $message; ?></span>
                
            </div>
        </div>
    </body>
</html>