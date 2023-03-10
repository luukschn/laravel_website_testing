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

            #cell-0,  #cell-1,  #cell-2  { border-top:    2px solid #000000; }
            #cell-2,  #cell-11, #cell-20 { border-right:  2px solid #000000; }
            #cell-18, #cell-19, #cell-20 { border-bottom: 2px solid #000000; }
            #cell-0,  #cell-9,  #cell-18 { border-left:   2px solid #000000; }

            #cell-3,  #cell-4,  #cell-5  { border-top:    2px solid #000000; }
            #cell-5,  #cell-14, #cell-23 { border-right:  2px solid #000000; }
            #cell-21, #cell-22, #cell-23 { border-bottom: 2px solid #000000; }
            #cell-3,  #cell-12, #cell-21 { border-left:   2px solid #000000; }

            #cell-6,  #cell-7,  #cell-8  { border-top:    2px solid #000000; }
            #cell-8,  #cell-17, #cell-26 { border-right:  2px solid #000000; }
            #cell-24, #cell-25, #cell-26 { border-bottom: 2px solid #000000; }
            #cell-6,  #cell-15, #cell-24 { border-left:   2px solid #000000; }

            #cell-27, #cell-28, #cell-29 { border-top:    2px solid #000000; }
            #cell-29, #cell-38, #cell-47 { border-right:  2px solid #000000; }
            #cell-45, #cell-46, #cell-47 { border-bottom: 2px solid #000000; }
            #cell-27, #cell-36, #cell-45 { border-left:   2px solid #000000; }

            #cell-30, #cell-31, #cell-32 { border-top:    2px solid #000000; }
            #cell-32, #cell-41, #cell-50 { border-right:  2px solid #000000; }
            #cell-48, #cell-49, #cell-50 { border-bottom: 2px solid #000000; }
            #cell-30, #cell-39, #cell-48 { border-left:   2px solid #000000; }

            #cell-33, #cell-34, #cell-35 { border-top:    2px solid #000000; }
            #cell-35, #cell-44, #cell-53 { border-right:  2px solid #000000; }
            #cell-51, #cell-52, #cell-53 { border-bottom: 2px solid #000000; }
            #cell-33, #cell-42, #cell-51 { border-left:   2px solid #000000; }

            #cell-54, #cell-55, #cell-56 { border-top:    2px solid #000000; }
            #cell-56, #cell-65, #cell-74 { border-right:  2px solid #000000; }
            #cell-72, #cell-73, #cell-74 { border-bottom: 2px solid #000000; }
            #cell-54, #cell-63, #cell-72 { border-left:   2px solid #000000; }

            #cell-57, #cell-58, #cell-59 { border-top:    2px solid #000000; }
            #cell-59, #cell-68, #cell-77 { border-right:  2px solid #000000; }
            #cell-75, #cell-76, #cell-77 { border-bottom: 2px solid #000000; }
            #cell-57, #cell-66, #cell-75 { border-left:   2px solid #000000; }

            #cell-60, #cell-61, #cell-62 { border-top:    2px solid #000000; }
            #cell-62, #cell-71, #cell-80 { border-right:  2px solid #000000; }
            #cell-78, #cell-79, #cell-80 { border-bottom: 2px solid #000000; }
            #cell-60, #cell-69, #cell-78 { border-left:   2px solid #000000; }
        </style>

        <!-- <script src="{{ mix('js/script.js') }}"></script> -->
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- <script src="{{ mix('js/script.js') }}">
            document.getElementById("sudoku_gen").addEventListener("click", runScript);
        </script> -->

    </head>

        <div class='sudoku-grid'>
            <h1>Sudoku based on your level of proficiency<h1>  
                
            <table id="grid">
                <tr> 
                    <td><input id="cell-0" type="text" value="5" disabled></td>
                    <td><input id="cell-1" type="text"></td>
                    <td><input id="cell-2" type="text"></td>

                    <td><input id="cell-3" type="text"></td>
                    <td><input id="cell-4" type="text"></td>
                    <td><input id="cell-5" type="text"></td>

                    <td><input id="cell-6" type="text"></td>
                    <td><input id="cell-7" type="text"></td>
                    <td><input id="cell-8" type="text"></td>
                </tr>

                <tr>
                    <td><input id="cell-9"  type="text" value="6" disabled></td>
                    <td><input id="cell-10" type="text"></td>
                    <td><input id="cell-11" type="text"></td>
                    
                    <td><input id="cell-12" type="text" value="1" disabled></td>
                    <td><input id="cell-13" type="text" value="9" disabled></td>
                    <td><input id="cell-14" type="text" value="5" disabled></td>
                    
                    <td><input id="cell-15" type="text"></td>
                    <td><input id="cell-16" type="text"></td>
                    <td><input id="cell-17" type="text"></td>
                </tr>

                <tr>          
                    <td><input id="cell-18" type="text"></td>
                    <td><input id="cell-19" type="text" value="9" disabled></td>
                    <td><input id="cell-20" type="text" value="8" disabled></td>
                    
                    <td><input id="cell-21" type="text"></td>
                    <td><input id="cell-22" type="text"></td>
                    <td><input id="cell-23" type="text"></td>
                    
                    <td><input id="cell-24" type="text"></td>
                    <td><input id="cell-25" type="text" value="6" disabled></td>
                    <td><input id="cell-26" type="text"></td>
                </tr>

                <tr>          
                    <td><input id="cell-27" type="text" value="8" disabled></td>
                    <td><input id="cell-28" type="text"></td>
                    <td><input id="cell-29" type="text"></td>
                    
                    <td><input id="cell-30" type="text"></td>
                    <td><input id="cell-31" type="text" value="6" disabled></td>
                    <td><input id="cell-32" type="text"></td>
                    
                    <td><input id="cell-33" type="text"></td>
                    <td><input id="cell-34" type="text"></td>
                    <td><input id="cell-35" type="text" value="3" disabled></td>
                </tr>

                <tr>          
                    <td><input id="cell-36" type="text" value="4" disabled></td>
                    <td><input id="cell-37" type="text"></td>
                    <td><input id="cell-38" type="text"></td>
                    
                    <td><input id="cell-39" type="text" value="8" disabled></td>
                    <td><input id="cell-40" type="text"></td>
                    <td><input id="cell-41" type="text" value="3" disabled></td>
                    
                    <td><input id="cell-42" type="text"></td>
                    <td><input id="cell-43" type="text"></td>
                    <td><input id="cell-44" type="text" value="1" disabled></td>
                </tr>

                <tr>          
                    <td><input id="cell-45" type="text" value="7" disabled></td>
                    <td><input id="cell-46" type="text"></td>
                    <td><input id="cell-47" type="text"></td>
                    
                    <td><input id="cell-48" type="text"></td>
                    <td><input id="cell-49" type="text" value="2" disabled></td>
                    <td><input id="cell-50" type="text"></td>
                    
                    <td><input id="cell-51" type="text"></td>
                    <td><input id="cell-52" type="text"></td>
                    <td><input id="cell-53" type="text" value="6" disabled></td>
                </tr>

                <tr>          
                    <td><input id="cell-54" type="text"></td>
                    <td><input id="cell-55" type="text" value="6" disabled></td>
                    <td><input id="cell-56" type="text"></td>
                    
                    <td><input id="cell-57" type="text"></td>
                    <td><input id="cell-58" type="text"></td>
                    <td><input id="cell-59" type="text"></td>
                    
                    <td><input id="cell-60" type="text" value="2" disabled></td>
                    <td><input id="cell-61" type="text" value="8" disabled></td>
                    <td><input id="cell-62" type="text"></td>
                </tr>

                <tr>          
                    <td><input id="cell-63" type="text"></td>
                    <td><input id="cell-64" type="text"></td>
                    <td><input id="cell-65" type="text"></td>
                    
                    <td><input id="cell-66" type="text" value="4" disabled></td>
                    <td><input id="cell-67" type="text" value="1" disabled></td>
                    <td><input id="cell-68" type="text" value="9" disabled></td>
                    
                    <td><input id="cell-69" type="text"></td>
                    <td><input id="cell-70" type="text"></td>
                    <td><input id="cell-71" type="text" value="5" disabled></td>
                </tr>

                <tr>          
                    <td><input id="cell-72" type="text"></td>
                    <td><input id="cell-73" type="text"></td>
                    <td><input id="cell-74" type="text"></td>
                    
                    <td><input id="cell-75" type="text"></td>
                    <td><input id="cell-76" type="text" value="8" disabled></td>
                    <td><input id="cell-77" type="text"></td>
                    
                    <td><input id="cell-78" type="text"></td>
                    <td><input id="cell-79" type="text" value="7" disabled></td>
                    <td><input id="cell-80" type="text" value="9" disabled></td>
                </tr>
        </div>

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

