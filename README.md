Varibles
=========

Simple Class to get global variables

Usage

For _GET and _POST

Variables::Get(array('name'),function)
Variables::Post('name',function)

First paramentr is name of variables in global array, can be string or array or its can be *, then return all
function is lambda function to process variable befor output, only one parametr and its array

Can be used for all types like _SERVER, _FILES, _ENV, _COOKIE, and so on