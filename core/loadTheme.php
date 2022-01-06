<?php

function loadTheme(){
  switch(CURRENT_THEME){
    case 'q1':
      \q1\register\Q1Theme::getInstance();
      break;
  }
}