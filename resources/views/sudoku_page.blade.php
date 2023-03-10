@extends('layouts.app')

@section('title', 'Sudoku')

@section('content')

<!--
REDO GENERATION OF THIS WITH PHP
make it so it generates based on the score from the DB

remake sudokucontroller, logic to say how many squares need to be filled gets done in there
-->

        <style type="text/css">
            html, body {
                background-color: #FAFAFA
            }

            table {
                border: 2px solid #000000;
            }

            td {
                border: 1px solid #000000;
                text-align: center;
                vertical-align: middle;
            }

            input {
                color: #000000;
                padding: 0;
                border: 0;
                text-align: center;
                width: 48px;
                height: 48px;
                font-size: 24px;
                background-color: #FFFFFF;
                outline: none
            }

            input:disabled {
                background-color: #EEEEEE;
            }

            <?php 
                for ($x=0; $x<=8; $x++) {
                    for ($y=0; $y<=8; $y++){
                        if ($y == 2 || $y == 5) {
                            echo "#cell_" . $x . "-" . $y . " { border-right: 2px solid #000000; }";
                        }
                        if ($y == 3 || $y == 6) {
                            echo "#cell_" . $x . "-" . $y . " { border-left: 2px solid #000000; }";
                            # code...
                        } if ($x == 2 || $x == 5) {
                            echo "#cell_" . $x . "-" . $y . " { border-bottom: 2px solid #000000; }";
                        } if ($x == 3 || $x == 6) {
                            echo "#cell_" . $x . "-" . $y . " { border-top: 2px solid #000000; }";
                        }
                    }
                }
            ?>
        </style>

        <!-- <script src="{{ mix('js/script.js') }}"></script> -->
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- <script src="{{ mix('js/script.js') }}">
            document.getElementById("sudoku_gen").addEventListener("click", runScript);
        </script> -->

    </head>

    <!--
    Best to do the sudoku logic in the controller. Do i then just send an array of numbers which should be filled in and what value?
    Seems like i am making the sudoku twice then, but oh well.
    
    -->
    <div id="sudoku">
        <h1>Sudoku based on your level of proficiency<h1>
        <table id="sudoku_grid">
            <?php
                for ($i=0; $i<=8; $i++) {
                    echo "<tr>";
                    for ($j=0; $j<=8; $j++) {
                        $cell_name = "cell_" . $i . "-" . $j;
                        echo "<td><input id='" . $cell_name . "' type='text'></td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
    </div>



        <!-- <div class='sudoku-grid'>
                    Example how to format it differently
                    <td><input id="cell-0" type="text" value="5" disabled></td>
        </div> -->

        <div>
            <!-- <button id="run-script">Generate a new sudoku</button> -->
            <!-- Result not showing up in the console. need to find out why,
            then ensure it gets displayed on the page. Can work from there

            Function works when you call localhost:8000/run-script directly. So only the calling is the issue
            -> also seems to be issues with the page itself. 500 internal server error, so somethng is amiss

            Need a more dynamic sudoku for this to work properly though -->
            <!-- <button id="sudoku_gen" onclick="runScript();">Generate a new Sudoku</button> -->
            <button id="sudoku_gen">Generate a new Sudoku</button>
            <div id="result">Hello<div>
        </div>

    
@endsection

