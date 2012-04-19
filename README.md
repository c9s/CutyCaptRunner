CutyCaptRunner
===============

This is a wrapper class for cutycapt tool (http://cutycapt.sourceforge.net/)

To use this, you must build cutycapt with qt4 and qt4-devel, qt4-webkit.

```php
<?php
    $runner = new CutyCaptRunner('path/to/CutyCapt');

    $runner->minHeight = 300;
    $runner->minWidth = 300;

    $runner->capture( 'http://google.com' , 'google.png' );
```
