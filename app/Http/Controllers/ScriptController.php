<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\Process\Process;


class ScriptController extends Controller
{
    // public function run() {
    //     $output = '';
    //     $return_var = 0;
    //     shell_exec("python python/sudoku_generator.py");
    //     return response()->json(['output' => $output, 'return_var' => $return_var]);
    // }
    public function run() {
        $process = new Process(['python3', '../python/sudoku_generator.py']);
        $process->run();

        if(!$process->isSuccessful()) {
            // throw new ProcessFailedException($process);
            throw new \Symfony\Component\Process\Exception\ProcessFailedException($process);
        }

        $data = $process->getOutput();

        // dd($data);
        return response()->json(['output' => $data]);
    }
}
