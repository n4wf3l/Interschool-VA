<x-app-layout>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IM+Fell+Double+Pica+SC&family=Inter&family=Koulen&family=League+Gothic&family=Lobster&family=Playfair+Display+SC&family=Saira+Condensed:wght@600&family=Saira+Stencil+One&family=Waterfall&display=swap" rel="stylesheet">
        <style>
            *
            {
                font-family: 'Saira Condensed', sans-serif;
            margin:0;
            padding: 0;
            box-sizing: border-box;
            }
            .container
            {
            display:flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            }
            .flex
            {
           text-align: center;
           align-items: center;
            }
            .text-content
            {
                max-width: 20%; /* Set width to 20% */
            }

            .text-content p
            {
           size:30px ;
           width: 330px;
            }

            .button
            {
                margin-top: -0.1px;
                margin-right: 100px;
                margin-bottom: 0;
                text-align: right;
                height: 400%;

                text-align: center;


            }
            button
            {
         background-color: #1BBCB6;
         border: initial;
         padding: 1em;
         margin-left: 100px;
         margin-top: 20px;

            }
            button:hover {
            cursor: pointer;
          background: navy;
                   }
            .text-content h2
            {
                margin-top: -55px;
                margin-bottom: 50px;
            }
            @media (max-width: 768px) {
            .container {
                flex-direction: column; /* Stack items vertically on smaller screens */
                align-items: stretch;
            }
        }

/* Styles for screens larger than 768px */
@media (min-width: 769px) {
        .container {
            flex-direction: row;
        }
    }



            .soccer
            {
                margin: 10px;
                margin-top: 150px;
               margin-left: 280px;
                border-right-width: 20%;
                border-left-width: 60%;
                width: 450px;
                height: 450px;
                align-items: center;
            }
        </style>
    </head>

    <main>
</main>
</x-app-layout>
