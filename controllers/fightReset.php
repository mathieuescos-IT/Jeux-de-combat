<?php

session_start();
session_destroy();

header('Location: /itakademy4/eval');
exit();
