<?php
function isconnected():bool{
    return !empty($_SESSION['connected']);
}