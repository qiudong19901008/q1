<?php

 namespace q1\setting;

 use \CSF;

 // Create a top-tab
 CSF::createSection( $prefix, array(
  'id'    => 'primary_tab', // Set a unique slug-like ID
  'title' => 'Primary Tab',
) );

//
// Create a sub-tab
CSF::createSection( $prefix, array(
  'parent' => 'primary_tab', // The slug id of the parent section
  'title'  => 'Sub Tab 1',
  'fields' => array(

    // A text field
    array(
      'id'    => 'opt-text',
      'type'  => 'text',
      'title' => 'Simple Text',
    ),

  )
) );

//
// Create a sub-tab
CSF::createSection( $prefix, array(
  'parent' => 'primary_tab',
  'title'  => 'Sub Tab 2',
  'fields' => array(

    // A textarea field
    array(
      'id'    => 'opt-textarea',
      'type'  => 'textarea',
      'title' => 'Simple Textarea',
    ),

  )
) );

//
// Create a top-tab
CSF::createSection( $prefix, array(
  'id'    => 'secondry_tab', // Set a unique slug-like ID
  'title' => 'Secondry Tab',
) );


//
// Create a sub-tab
CSF::createSection( $prefix, array(
  'parent' => 'secondry_tab', // The slug id of the parent section
  'title'  => 'Sub Tab 1',
  'fields' => array(

    // A switcher field
    array(
      'id'    => 'opt-switcher',
      'type'  => 'switcher',
      'title' => 'Simple Switcher',
    ),

  )
) );