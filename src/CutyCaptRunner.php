<?php


class CutyCaptRunner
{
    public $bin;

    public $delay;

    public $outputFormat;

    public $minWidth;

    public $minHeight;

    public $javascript = true;

    public $zoomFactor;

    public $maxWait = 80000;

    public $debug = false;

    public function __construct($bin)
    {
        if( ! file_exists($bin) ) {
            throw new RuntimeException("$bin file does not exist.");
        }

        if( ! is_executable( $bin ) ) {
            throw new RuntimeException("$bin is not executable");
        }
        $this->bin = $bin;
    }

    public function capture($url, $output, $display = null) {
        if( $display ) {
            putenv("DISPLAY=$display");
        }
        $cmds = array( $this->bin );


        if( $this->outputFormat )
            $cmds[] = '--out-format=' . $this->outputFormat;

        if( $this->minWidth )
            $cmds[] = '--min-width=' . $this->minWidth;

        if( $this->minHeight )
            $cmds[] = '--min-height=' . $this->minHeight;

        $cmds[] = '--javascript=' . ($this->javascript ? 'on' : 'off');

        if( $this->zoomFactor ) {
            $cmds[] = '--zoom-factor=' . $this->zoomFactor;
        }

        if( $this->maxWait ) {
            $cmds[] = '--max-wait=' . $this->maxWait;
        }

        $cmds[] = '--url=' . $url;
        $cmds[] = '--out=' . $output;
        $cmdstr =  join(' ',array_map(function($arg) { return escapeshellarg($arg); },$cmds));

        if( $this->debug ) {
            print_r( $cmdstr ); 
        }
        return system($cmdstr);
    }

}

